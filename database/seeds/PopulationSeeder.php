<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PopulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $edu = App\Education::count();
        $ocu = App\Occupation::count();
        DB::table('populations')->truncate();

        $data = [
            [
                'nik' => '3279040107600020',
                'name' => 'UNANG KURDIAN',
                'gender' => 'L',
                'birthplace' => 'CIAMIS',
                'birthdate' => '1960-07-01',
                'bloodtype' => '-',
                'religion' => 'Islam',
                'status' => 'Cerai Hidup',
                'education_id' => '3',
                'occupation_id' => '4',
            ],[
                'nik' => '3207171007830001',
                'name' => 'MAHLANI',
                'gender' => 'L',
                'birthplace' => 'CIAMIS',
                'birthdate' => '1983-07-10',
                'bloodtype' => '-',
                'religion' => 'Islam',
                'status' => 'Kawin',
                'education_id' => '5',
                'occupation_id' => '3',
            ],[
                'nik' => '3279044111870001',
                'name' => 'SITI NURAISAH',
                'gender' => 'P',
                'birthplace' => 'CIAMIS',
                'birthdate' => '1987-11-01',
                'bloodtype' => '-',
                'religion' => 'Islam',
                'status' => 'Kawin',
                'education_id' => '5',
                'occupation_id' => '3',
            ],[
                'nik' => '3279042704090001',
                'name' => 'DENI APRILLIANSAH',
                'gender' => 'L',
                'birthplace' => 'BANJAR',
                'birthdate' => '2009-04-27',
                'bloodtype' => '-',
                'religion' => 'Islam',
                'status' => 'Belum Kawin',
                'education_id' => '2',
                'occupation_id' => '2',
            ],[
                'nik' => '3279041009820003',
                'name' => 'AHMAD ZUBAIDI',
                'gender' => 'L',
                'birthplace' => 'CIAMIS',
                'birthdate' => '1982-09-10',
                'bloodtype' => '-',
                'religion' => 'Islam',
                'status' => 'Belum Kawin',
                'education_id' => '4',
                'occupation_id' => '6',
            ],[
                'nik' => '3279010512810002',
                'name' => 'MUHSINUN',
                'gender' => 'L',
                'birthplace' => 'CIAMIS',
                'birthdate' => '1981-12-05',
                'bloodtype' => '-',
                'religion' => 'Islam',
                'status' => 'Kawin',
                'education_id' => '5',
                'occupation_id' => '6',
            ],[
                'nik' => '3279015601820002',
                'name' => 'KURNIYASIH',
                'gender' => 'P',
                'birthplace' => 'CIAMIS',
                'birthdate' => '1982-01-16',
                'bloodtype' => 'B',
                'religion' => 'Islam',
                'status' => 'Kawin',
                'education_id' => '5',
                'occupation_id' => '7',
            ],[
                'nik' => '3279014103080001',
                'name' => 'WIDADATUL ULYA',
                'gender' => 'P',
                'birthplace' => 'BANJAR',
                'birthdate' => '2008-03-01',
                'bloodtype' => '-',
                'religion' => 'Islam',
                'status' => 'Belum Kawin',
                'education_id' => '1',
                'occupation_id' => '1',
            ]
        ];

        foreach($data as $item){
            DB::table('populations')->insert([
                'nik'           => $item['nik'],
                'name'          => $item['name'],
                'gender'        => $item['gender'],
                'birthplace'    => $item['birthplace'],
                'birthdate'     => $item['birthdate'],
                'bloodtype'     => $item['bloodtype'],
                'religion'      => $item['religion'],
                'status'        => $item['status'],
                'education_id'  => $item['education_id'],
                'occupation_id' => $item['occupation_id'],
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]);
        }
    }
}
