<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Sensor extends Model
{
	public $i2c_get;
	public $i2c_set;
    public $i2c_address;
    public $i2c_bus;
    public $channels = [];

    public function __construct()
    {
		$this->i2c_get = '/usr/sbin/i2cget -y';
		$this->i2c_set = '/usr/sbin/i2cset -y';
        $this->i2c_bus = 1;
        $this->i2c_address = 0x40;
        $this->channels = $this->populateChannels();
    }
	
	public function timer()
	{
		return $this->hasOne('\App\Timer');
	}

    public function profiles()
    {
        return $this->belongsToMany('\App\Profile');
    }
	
	public function setSensor($value)
	{
		switch ($this->type) {
			case 1:
				if ($value>0) { $value = 1; } else { $value = 0; }
				$this->setGPIO($value);
				break;
			case 2:
				$this->setPWMpercent($value);
				break;
			case 3:
				$this->setPlay($value);
				break;
		}
	}

    public function getGPIO()
	{
		if ($this->type <> 3) {
			$command = 'gpio -g read '.$this->chip_address;
			return (bool) base_convert($this->execute($command), 16, 10);
		} else {
			$command = 'pgrep mpg321';
			$result = $this->execute($command);
			if ($result != "") { return true; } else { return false; }
		}
    }
	
	public function setGPIO($value, $file_number = null)
	{
		if ($this->type <> 3) {
			$command = 'gpio -g mode '.$this->chip_address.' out';
			$this->execute($command);

			$command = 'gpio -g write '.$this->chip_address.' '.$value;
			$this->execute($command);
			
		} else {
			$this->setPlay($file_number);
		}
		
		if ($value == 0) {
			$timer = Timer::where('sensor_id', '=', $this->id)->first();

			if (count($timer)) {
				$timer->delete();
			}
			if ($this->type == 3) {
				$this->setplay(0);
			}

		}
	}

    public function toggleGPIO()
	{
		$current = $this->getGPIO();
		
		$command = 'gpio -g mode '.$this->chip_address.' out';
		$this->execute($command);
		
		if ($current == 1) {
			$command = 'gpio -g write '.$this->chip_address.' 0';
			// $command = 'gpio -g write 5 0';
			$this->execute($command);
			// $command = 'gpio -g mode 5 in';
			// $this->execute($command);
		} else {
			$command = 'gpio -g write '.$this->chip_address.' 1';
			// $command = 'gpio -g write 5 1';
			$this->execute($command);
			// $command = 'gpio -g mode 5 out';
			// $this->execute($command);
		}
    }

	public function getPWM()
	{
		if ($this->type <> 3) {
			$command = $this->i2c_get.' '.$this->i2c_bus.' '.$this->i2c_address.' '.$this->channels[$this->chip_address][2].' b';
			$firstbit = base_convert(rtrim($this->execute($command)), 16, 10);
			$command = $this->i2c_get.' '.$this->i2c_bus.' '.$this->i2c_address.' '.$this->channels[$this->chip_address][3].' b';
			$secondbit = base_convert(rtrim($this->execute($command)), 16, 10);

			return round(($firstbit + $secondbit * 256) * 100 / 4096);
		} else {
			// $command = "awk '/%/ {gsub(/[\[\]]/,aa); print $4}' <(amixer sget PCM)";
			$command = "amixer sget PCM";
			$result = $this->execute($command);
			preg_match("/\[(.*)%/",$result,$m);
			return $m[1];
		}
    }

    public function setPWMpercent($percent)
    {
		if ($this->type <> 3) {
			$value = round(4096 * $percent / 100);
			$this->setPWM($this->chip_address, $value);
		} else {
			$command = "amixer --quiet sset 'PCM' ".$percent."%";
			$this->execute($command);
		}

    }

    public function setPWM($channel, $countOff, $countOn = 0)
    {
		$fullcmd = "";
        list($onHi, $onLo) = $this->get12bit($countOn);
        list($offHi, $offLo) = $this->get12bit($countOff);
		$command = $this->i2c_set.' '.$this->i2c_bus.' '.$this->i2c_address.' '.$this->channels[$channel][0].' '.$onLo;
		$this->execute($command);

		$command = $this->i2c_set." ".$this->i2c_bus." ".$this->i2c_address." ".$this->channels[$channel][1]." ".$onHi;
		$this->execute($command);

		$command = $this->i2c_set." ".$this->i2c_bus." ".$this->i2c_address." ".$this->channels[$channel][2]." ".$offLo;
		$this->execute($command);

		$command = $this->i2c_set." ".$this->i2c_bus." ".$this->i2c_address." ".$this->channels[$channel][3]." ".$offHi;
		$this->execute($command);


    }

    public function setAll($countOff, $countOn = 0)
    {
        list($onHi, $onLo) = $this->get12bit($countOn);
        list($offHi, $offLo) = $this->get12bit($countOff);
        exec("{$this->i2c_set} {$this->i2c_bus} {$this->i2c_address} 250 {$onLo}");
        exec("{$this->i2c_set} {$this->i2c_bus} {$this->i2c_address} 251 {$onHi}");
        exec("{$this->i2c_set} {$this->i2c_bus} {$this->i2c_address} 252 {$offLo}");
        exec("{$this->i2c_set} {$this->i2c_bus} {$this->i2c_address} 253 {$offHi}");
    }

    public function setFrequency($frequency)
    {
        $value = round(25000000 / (4096 * $frequency)) - 1;
        // the PCA9685 has frequency limits, we'll be sure we're within those
        if($value < 3) $value = 3;
        if($value > 255) $value = 255;
        exec("{$this->i2c_set} {$this->i2c_bus} {$this->i2c_address} 254 {$value}");
		// dd("{$this->i2c_set} {$this->i2c_bus} {$this->i2c_address} 254 {$value}");
    }

    private function get12bit($value)
    {
        if($value < 0) $value = 0;
        if($value > 4095) $value = 4095;
        $hi = floor($value / 256);
        $lo = $value % 256;
        return [$hi,$lo];
    }

    /*
     * The 16 PWM channels on the PCA9685 each have four registers from address 6 to 69.
     * This generates an array of the register IDs for each channel
     * as such: $channel[$channelID][onLow,onHi,offLow,offHi]
     */
    private function populateChannels()
    {
        $ch = 0;
        $channels = [];
        for($i=1; $i<=64; $i++) {
            $channels[$ch][] = $i+5;
            if($i%4 == 0) $ch++;
        }
        return $channels;
    }


    private function execute($command)
    {
        $result = shell_exec($command . ' 2>&1');

        if (strncmp($result, 'Error:', 6) === 0) {
            return false;
        }

        return $result;
    }
	
	public function setPlay($value)
	// TODO file_number
	{
		if ($value === 0) {
			$command = 'killall mpg321';
			$this->execute($command);
		} else {
			$command = 'killall mpg321';
			$this->execute($command);
			
			// FIXME go background
			shell_exec('nohup mpg321 --loop --quiet --gain 90 /var/www/html/sh-local/public/sound/'.$value.'.mp3 2> /dev/null & echo $!');
			
		}
		
	}
	
	public function getPlayed()
	{
		$command = 'pgrep -a mpg321';
		$result = $this->execute($command);
		if ($result != "") {
			preg_match("/.*\/(.*)\.mp3/",$result,$m);
			return $m[1];
		} else {
			return false;
		}
	}
	
	public function getTimer()
	{

		if (count($this->timer)) {
			return true;
		}
		
		return false;
	}
	
}
