<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timer;
use App\Sensor;

class TimerController extends Controller
{
   
	public function checkTimers() 
	{
		$timers = Timer::where('end_time', '<=', now())->get();
		
	    foreach ($timers as $timer) {
		 	   $timer->remove();
	    }
	}
	
	public function getTimer(Sensor $sensor)
	{
		return response()->json(['success' => true,  'value' => $sensor->getTimer()]);
	}

	public function setTimer(Request $request, int $sensor)
	{
		$timer = Timer::where('sensor_id', '=', $sensor)->first();
		// dd(count($timer));
		if (count($timer)) {
			try {
				$timer->remove();
			} catch (\Exception $e) {
				return response()->json(['success' => false, 'error' => $e->getMessage()], 503);
			}

			return response()->json(['success' => true, 'value' => false]);
			
		} else {
			$this->validate(request(), [
				'minutes' => 'integer',
			]);
			
			$sensor = Sensor::find($sensor);
			
			$now = time();
			$ten_minutes = $now + (request('minutes') * 60);
			$end_time = date('Y-m-d G:i:s', $ten_minutes);

			try {
				$timer = Timer::create(['sensor_id' => $sensor->id, 'end_time' => $end_time]);
				$sensor->setGPIO(1, request('file_number'));
			} catch (\Exception $e) {
				return response()->json(['success' => false, 'error' => $e->getMessage()], 503);
			}
			
			return response()->json(['success' => true,  'value' => $sensor->getTimer()]);
		}
    }
}
