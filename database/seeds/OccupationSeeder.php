<?php

use Illuminate\Database\Seeder;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('occupations')->truncate();

        $data = [
            'Belum/Tidak Bekerja',
            'Pelajar/Mahasiswa',
            'Karyawan Swasta',
            'Petani/Pekebun',
            'Buruh',
            'Wiraswasta',
            'Mengurus Rumah Tangga'
        ];

        foreach($data as $item){
            DB::table('occupations')->insert([
                'name' => $item
            ]);
        }
    }
}
