<?php

use Illuminate\Database\Seeder;

class ServicingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $pops = App\Population::count();
        $facs = App\Facility::count();
        DB::table('servicings')->truncate();

        for ($i=1; $i < $facs; $i++) { 
            for ($p=1; $p < $pops; $p++) { 
                DB::table('servicings')->insert([
                    'population_id' => $p,
                    'facility_id' => $i,
                    'created_at' => Carbon\Carbon::now(),
                    'updated_at' => Carbon\Carbon::now()
                ]);
            }
        }
    }
}
