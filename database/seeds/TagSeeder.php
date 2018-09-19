<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('tags')->truncate();

        $tags = [
            'Pertanian',
            'Perkebunan',
            'Pendidikan',
            'Kesehatan',
            'Pariwisata',
            'Umum'
        ];

        foreach($tags as $index){
            DB::table('tags')->insert([
                'name' => $index,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
