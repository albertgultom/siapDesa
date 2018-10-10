<?php

use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('facilities')->truncate();

        $names = [
            'Surat Keterangan Penduduk',
            'Surat Keterangan Biodata Penduduk',
            'Surat Keterangan Kurang Mampu',
            'Surat Keterangan Kelahiran',
            'Surat Keterangan Kematian',
            'Surat Pengantar Akta Lahir',
            'Surat Pengantar Nikah (N1-N6)',
        ];

        foreach($names as $name){
            DB::table('facilities')->insert([
                'name' => $name,
                'detail' => $faker->paragraph($nbSentences = 8, $variableNbSentences = true),
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ]);
        }
    }
}
