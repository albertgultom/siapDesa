<?php

use Illuminate\Database\Seeder;

class JuristicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        App\Juristical::truncate();

        for ($i=0; $i < 8; $i++) { 
            App\Juristical::insert([
                'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                'detail' => $faker->paragraph($nbSentences = 8, $variableNbSentences = true),
                'file' => '80448765.pdf',
                'active' => 1,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ]);
        }
    }
}
