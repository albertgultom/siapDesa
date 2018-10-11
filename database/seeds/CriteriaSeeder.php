<?php

use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('criterias')->truncate();
        DB::table('tabulations')->truncate();

        $faker = Faker\Factory::create();

        $potens = [
            [
                'name' => 'Sumber Daya Alam',
                'criteriaable_id' => null,
                'criteriaable_type' => null
            ],[
                'name' => 'Potensi Umum',
                'criteriaable_id' => 1,
                'criteriaable_type' => 'App\Criteria'
            ],[
                'name' => 'Luas Wilayah Menurut Penggunaan',
                'criteriaable_id' => 2,
                'criteriaable_type' => 'App\Criteria'
            ],[
                'name' => 'Tanah Sawah',
                'criteriaable_id' => 3,
                'criteriaable_type' => 'App\Criteria'
            ],[
                'name' => 'Tanah Kering',
                'criteriaable_id' => 3,
                'criteriaable_type' => 'App\Criteria'
            ],[
                'name' => 'Tanah Fasilitas Umum',
                'criteriaable_id' => 3,
                'criteriaable_type' => 'App\Criteria'
            ],[
                'name' => 'Topografi',
                'criteriaable_id' => 2,
                'criteriaable_type' => 'App\Criteria'
            ],[
                'name' => 'Sarana dan Prasarana',
                'criteriaable_id' => null,
                'criteriaable_type' => null
            ],[
                'name' => 'Prasarana Peribadatan',
                'criteriaable_id' => 8,
                'criteriaable_type' => 'App\Criteria'
            ]
        ];

        foreach ($potens as $key => $value) {
            DB::table('criterias')->insert([
                'name' => $value['name'],
                'criteriaable_id' => $value['criteriaable_id'],
                'criteriaable_type' => $value['criteriaable_type']
            ]);
        }

        $tabs = [
            [
                'cid' => 4,
                'name' => 'Sawah irigasi teknis',
                'numeral' => 190.95,
                'identity' => 'Ha'
            ],[
                'cid' => 4,
                'name' => 'Sawah irigasi 1/2 teknis',
                'numeral' => 10,
                'identity' => 'Ha'
            ],[
                'cid' => 4,
                'name' => 'Sawah Tadah Hujan',
                'numeral' => .5,
                'identity' => 'Ha'
            ]
        ];

        foreach ($tabs as $key => $value) {
            DB::table('tabulations')->insert([
                'criteria_id' => $value['cid'],
                'name' => $value['name'],
                'numeral' => $value['numeral'],
                'identity' => $value['identity']
            ]);
        }
    }
}
