<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(TaggableSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(Apparatus1Seeder::class);
        $this->call(EducationSeeder::class);
        $this->call(OccupationSeeder::class);
        $this->call(PopulationSeeder::class);
        $this->call(KarkelSeeder::class);
        $this->call(FamiliarSeeder::class);
        $this->call(FacilitySeeder::class);
        $this->call(ServicingSeeder::class);
    }
}
