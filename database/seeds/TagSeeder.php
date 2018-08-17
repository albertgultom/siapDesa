<?php

use Illuminate\Database\Seeder;

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
                'name' => $index
            ]);
        }
    }
}
