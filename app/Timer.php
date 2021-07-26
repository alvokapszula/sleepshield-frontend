<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Timer extends Model
{
	protected $guarded = ['id'];
    protected $dates = [
        'end_time',
    ]; 
	
	public function sensor()
	{
		return $this->belongsTo('\App\Sensor');
	}
   
    public function remove()
    {
		$sensor = Sensor::where('id', '=', $this->sensor_id)->first();
		if (isset($sensor->id)) {
			$sensor->setSensor(0);
		}
		$this->delete();
    }
}
