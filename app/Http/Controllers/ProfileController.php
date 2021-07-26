<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
    }

    public function activate(Profile $profile)
    {

	foreach ($profile->sensors->where('type', '<>', 3) as $sensor) {
			$sensor->setSensor($sensor->pivot->value);
		}

        return redirect('/')->withSuccess(__('messages.profile-activated', ['num' => $profile->id]));

    }

}
