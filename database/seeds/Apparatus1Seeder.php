<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Apparatus1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('apparatuses')->truncate();

        $apparatuses = [
            [
                'name' => 'SITI AISAH, S.IP',
                'position' => 'Kepala Desa',
                'image' => 'siti-aisyah.jpg',
                'number' => 1,
                'active' => 1
            ],
            [
                'name' => 'ARIS SOMANTRI, S.Pd.I',
                'position' => 'Sekretaris Desa',
                'image' => 'albumtemp-36.jpg',
                'number' => 2,
                'active' => 1
            ],
            [
                'name' => 'M. IQBAL AL-HAMDANI',
                'position' => 'KAUR TU & Umum',
                'image' => 'businessman.png',
                'number' => 3,
                'active' => 1
            ],
            [
                'name' => 'SITI NURHASANAH, A.Md',
                'position' => 'KAUR Keuangan',
                'image' => 'businesswoman.png',
                'number' => 4,
                'active' => 0
            ],
        ];

        foreach($apparatuses as $item){
            DB::table('apparatuses')->insert([
                'name' => $item['name'],
                'position' => $item['position'],
                'image' => $item['image'],
                'number' => $item['number'],
                'active' => $item['active'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
