<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShieldController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('shield.index');
    }

    public function sensors()
    {
 
		$data = $this->getSensorsData();
        return view('shield.sensors',compact('data'));
    }

    public function air()
    {
        // $profiles = Profile::all();
        // return view('home', compact('profiles'));
        return view('shield.air');
    }

    public function lighting()
    {
        // $profiles = Profile::all();
        // return view('home', compact('profiles'));
        return view('shield.lighting');
    }

    public function temperature()
    {
        // $profiles = Profile::all();
        // return view('home', compact('profiles'));
        return view('shield.temperature');
    }

    public function hepa()
    {
        // $profiles = Profile::all();
        // return view('home', compact('profiles'));
        return view('shield.hepa');
    }

    public function sound()
    {
        // $profiles = Profile::all();
        // return view('home', compact('profiles'));
        return view('shield.sound');
    }
	
	public function getSensorsData()
	{
		try {
			$fp = fopen("/dev/ttyUSB0", "r");
			$ser =  fread($fp,15);
			fclose($fp);
			$data = explode(':', $ser);
		} catch (\Exception $e) {
			$data = ["NaN","NaN","NaN"];
		}
		
		return $data;
	}
}
