<?php

namespace App\Http\Controllers;

use App\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function setPWM(Request $request, Sensor $sensor)
    {
        try {

            $this->validate(request(), [
              'value' => 'required|integer',
            ]);

            $sensor->setPWMpercent(request()->value);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 503);
        }
        return response()->json(['success' => true,  'value' => $sensor->getPWM()]);
    }

    public function getPWM(Sensor $sensor)
    {
        try {

            $value = $sensor->getPWM();

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 503);
        }
        return response()->json(['success' => true, "value" => $value]);
    }

    public function setGPIO(Request $request, Sensor $sensor)
    {
		if ($sensor->type <> 3) {
			try {

				$this->validate(request(), [
				  'value' => 'required|in:true,false',
				]);

				if (request()->value === "true") {
					$sensor->setGPIO(1);
				} elseif (request()->value === "false") {
					$sensor->setGPIO(0);
				}

			} catch (\Exception $e) {
				return response()->json(['success' => false, 'error' => $e->getMessage()], 503);
			}
			return response()->json(['success' => true,  'value' => $sensor->getGPIO()]);
		} else {
			try {

				$this->validate(request(), [
				  'value' => 'required|in:true,false',
				  'file_number' => 'required|integer',
				]);

				if (request()->value === "true") {
					$sensor->setPlay(request('file_number'));
				} elseif (request()->value === "false") {
					$sensor->setSensor(0);
				}

			} catch (\Exception $e) {
				return response()->json(['success' => false, 'error' => $e->getMessage()], 503);
			}
			return response()->json(['success' => true,  'value' => $sensor->getGPIO()]);
		}
    }

    public function getGPIO(Sensor $sensor)
    {
        try {

            $value = $sensor->getGPIO();

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 503);
        }
        return response()->json(['success' => true, "value" => $value]);
    }
	
}
