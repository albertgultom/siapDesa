<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('types')->truncate();

        $types = [
            'Potensi',
            'Kegiatan',
            'Pengumuman',
            'Agenda',
        ];

        foreach($types as $index){
            DB::table('types')->insert([
                'name' => $index,
                'level' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
