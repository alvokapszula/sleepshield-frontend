<?php

use Illuminate\Database\Seeder;
use App\Profile;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=1;$i<5;$i++) {
            $new = Profile::create([
                'name'     => $i.'. profil',
                'description' => 'Rövid leírás a profilról, pl. nyugalmi vackolódás a melegben vagy hidegrázás a 30\'-as évekből.',
            ]);
        }

    }
}
