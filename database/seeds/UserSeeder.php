<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name' => 'master',
            'email' => 'gultomic@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
    }
}
