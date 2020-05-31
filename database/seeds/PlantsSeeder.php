<?php

use Illuminate\Database\Seeder;
use App\Plant;

class PlantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $water = [
            '1.27-2.54',
            '2.54-5.08',
            '5.08-7.62',
            '2.54-6.35',
        ];
        $corn = Plant::updateOrCreate(['name'=>'Corn', 'scientific_name'=>"Zea Mays", 'variant'=>'120-day'],
        [
            'min_grow_temp' => '283.15',
            'opt_grow_temp' => '301.15',
            'tips' =>  $water,
        ]);
    }
}
