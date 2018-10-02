<?php

use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galleries')->truncate();
        DB::table('contents')->truncate();

        $faker = Faker\Factory::create();
        $types = App\Type::count();
        $count = 1;

        // PHOTOS
        for($type = 1; $type <= $types; $type++){
            DB::table('galleries')->insert([
                'user_id' => 1,
                'type_id' => $type,
                'name'    => $faker->sentence($nbWords = 4, $variableNbWords = true),
                'content' => 'photo',
                'active'  => 1,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ]);

            $contents = rand(3, 8);
            for($content = 1; $content <= $contents; $content++){
                DB::table('contents')->insert([
                    'gallery_id' => $count,
                    'name'       => $faker->sentence($nbWords = 3, $variableNbWords = true),
                    'image'      => 'KegiatanKepalaDesa/FTKaDes (' . rand(1, 28) . ').jpeg',
                    'active'     => 1,
                    'created_at' => Carbon\Carbon::now(),
                    'updated_at' => Carbon\Carbon::now()
                ]);
            }

            $count++;
        }

        // VIDEOS
        $videos = [
            "https://www.youtube.com/embed/j-x8H_Lgt-E",
            "https://www.youtube.com/embed/CkTry8EXiO0",
            "https://www.youtube.com/embed/0EVUDsUTM60",
            "https://www.youtube.com/embed/bzAIYMP1JNk",
            "https://www.youtube.com/embed/l-ciTU1z92I"
        ];

        for($type = 1; $type <= $types; $type++){
            DB::table('galleries')->insert([
                'user_id' => 1,
                'type_id' => $type,
                'name'    => $faker->sentence($nbWords = 4, $variableNbWords = true),
                'content' => 'video',
                'active'  => 1,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ]);

            $contents = rand(1, 4);
            for($content = 1; $content <= $contents; $content++){
                DB::table('contents')->insert([
                    'gallery_id' => $count,
                    'name'       => $faker->sentence($nbWords = 3, $variableNbWords = true),
                    'video'      => $videos[rand(0, 4)],
                    'active'     => 1,
                    'created_at' => Carbon\Carbon::now(),
                    'updated_at' => Carbon\Carbon::now()
                ]);
            }
            $count++;
        }
    }
}
