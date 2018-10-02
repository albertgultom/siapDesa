<?php

use Illuminate\Database\Seeder;

class TaggableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taggables')->truncate();

        $tags = App\Tag::count();
        $posts = App\Post::count();
        $galleries = App\Gallery::count();
        
        for($post = 1; $post <= $posts; $post++){
            $random = rand(1, 6);
            for($x = 1; $x <= $random; $x++){
                DB::table('taggables')->insert([
                    'tag_id' => rand(1, $tags),
                    'taggable_id' => $post,
                    'taggable_type' => 'App\Post'
                ]);
            }
        }

        for($gallery = 1; $gallery <= $galleries; $gallery++){
            $random = rand(1, 6);
            for($x = 1; $x <= $random; $x++){
                DB::table('taggables')->insert([
                    'tag_id' => rand(1, $tags),
                    'taggable_id' => $gallery,
                    'taggable_type' => 'App\Gallery'
                ]);
            }
        }
    }
}
