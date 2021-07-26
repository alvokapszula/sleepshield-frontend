<?php

use Illuminate\Database\Seeder;
use App\Sensor;

class SensorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=1;$i<6;$i++) {
            $new = Sensor::create([
                'name'     => $i.'. szenzor',
                'bus' => 1,
                'chip_address' => "0x00",
                'min'   => 0,
                'max'   => 255,
                'unit'  => '%',
                'type' => 0,
            ]);
        }

    }
}
