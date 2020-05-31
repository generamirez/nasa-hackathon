<?php

use Illuminate\Database\Seeder;
use App\ForeCast;

class NewForecastData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $f1 = ForeCast::updateOrCreate(['date' => '2019/06'],[
            'precipitation' => 259.3,
            'temperature' => 301.904,
        ]);
        $f2 = ForeCast::updateOrCreate(['date' => '2019/07'],[
            'precipitation' => 64.868,
            'temperature' => 299.708,
        ]);
        $f3 = ForeCast::updateOrCreate(['date' => '2019/08'],[
            'precipitation' => 433.183,
            'temperature' => 298.767,
        ]);
        $f4 = ForeCast::updateOrCreate(['date' => '2019/09'],[
            'precipitation' => 492.811,
            'temperature' => 298.281,
        ]);
        $f5 = ForeCast::updateOrCreate(['date' => '2019/10'],[
            'precipitation' => 59.574,
            'temperature' => 298.253,
        ]);
        $f6 = ForeCast::updateOrCreate(['date' => '2019/11'],[
            'precipitation' => 123.562,
            'temperature' => 297.84,
        ]);
        $f7 = ForeCast::updateOrCreate(['date' => '2019/12'],[
            'precipitation' => 89.922,
            'temperature' => 296.7,
        ]);
        $f8 = ForeCast::updateOrCreate(['date' => '2020/01'],[
            'precipitation' => 0.586,
            'temperature' => 297.062,
        ]);


        $f9 = ForeCast::updateOrCreate(['date' => '2020/02'],[
            'precipitation' => 2.172,
            'temperature' => 297.244,
        ]);
        $f10 = ForeCast::updateOrCreate(['date' => '2020/03'],[
            'precipitation' => 0.188,
            'temperature' => 299.927,
        ]);
        $f11 = ForeCast::updateOrCreate(['date' => '2020/04'],[
            'precipitation' => 1.551,
            'temperature' => 300.518,
        ]);
        $f12 = ForeCast::updateOrCreate(['date' => '2020/05'],[
            'precipitation' => 142.811,
            'temperature' => 302.07,
        ]);

        DB::commit();
    }
}
