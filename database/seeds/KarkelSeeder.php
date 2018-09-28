<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KarkelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karkels')->truncate();

        $data = [
            '3279040102100001',
            '3279040102160001',
            '3279040102170004',
            '3279040103120005',
        ];

        foreach($data as $item){
            DB::table('karkels')->insert([
                'no_kk'      => $item,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
