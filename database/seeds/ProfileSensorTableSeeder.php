<?php

use Illuminate\Database\Seeder;
use App\Profile;
use App\Sensor;

class ProfileSensorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=1;$i<6;$i++) {
            for ($j=1;$j<3;$j++) {
                $profile = Profile::find($j);
                $profile->sensors()->attach($i, ['value' => $j* 80]);
            }
        }

    }
}
