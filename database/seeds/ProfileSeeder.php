<?php

use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('profiles')->truncate();

        DB::table('profiles')->insert([
            'code' => '12345',
            'name' => 'Siapdesa',
            'subdistrict' => 'Kecamatan Contoh',
            'district' => 'Kota Contoh',
            'province' => 'Contoh'
        ]);
    }
}
