<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $types = App\Type::all();
        DB::table('posts')->truncate();

        foreach(range(1, 12) as $post){
            foreach($types as $type){
                DB::table('posts')->insert([
                    'user_id' => 1,
                    'type_id' => $type->id,
                    'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                    'image' => 'laravel.jpg',
                    'body' => $faker->paragraph($nbSentences = 25, $variableNbSentences = true),
                ]);
            }
        }
    }
}
