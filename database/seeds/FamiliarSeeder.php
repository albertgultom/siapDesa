<?php

use Illuminate\Database\Seeder;

class FamiliarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('familiars')->truncate();

        $data = [
            [
                'karkel_id' => '1',
                'population_id' => '1',
                'shdrt' => '1',
                'shdk' => 'Kepala Keluarga'
            ],[
                'karkel_id' => '2',
                'population_id' => '2',
                'shdrt' => '1',
                'shdk' => 'Kepala Keluarga'
            ],[
                'karkel_id' => '2',
                'population_id' => '3',
                'shdrt' => '3',
                'shdk' => 'Istri'
            ],[
                'karkel_id' => '2',
                'population_id' => '4',
                'shdrt' => '4',
                'shdk' => 'Anak'
            ],[
                'karkel_id' => '3',
                'population_id' => '5',
                'shdrt' => '1',
                'shdk' => 'Kepala Keluarga'
            ],[
                'karkel_id' => '4',
                'population_id' => '6',
                'shdrt' => '1',
                'shdk' => 'Kepala Keluarga'
            ],[
                'karkel_id' => '4',
                'population_id' => '7',
                'shdrt' => '3',
                'shdk' => 'Istri'
            ],[
                'karkel_id' => '4',
                'population_id' => '8',
                'shdrt' => '4',
                'shdk' => 'Anak'
            ]
        ];
    }
}
