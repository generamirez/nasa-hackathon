<?php

use Illuminate\Database\Seeder;
use App\ForeCast;

class ForeCastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        $f1 = ForeCast::updateOrCreate(['date' => '2020/06'],[
            'precipitation' => 265.884,
            'temperature' => 300.391,
        ]);
        $f2 = ForeCast::updateOrCreate(['date' => '2020/07'],[
            'precipitation' => 368.877,
            'temperature' => 299.084,
        ]);
        $f3 = ForeCast::updateOrCreate(['date' => '2020/08'],[
            'precipitation' => 347.581,
            'temperature' => 298.105,
        ]);
        $f4 = ForeCast::updateOrCreate(['date' => '2020/09'],[
            'precipitation' => 365.89,
            'temperature' => 298.036,
        ]);
        $f5 = ForeCast::updateOrCreate(['date' => '2020/10'],[
            'precipitation' => 187.486,
            'temperature' => 297.801,
        ]);
        $f6 = ForeCast::updateOrCreate(['date' => '2020/11'],[
            'precipitation' => 131.794,
            'temperature' => 298.301,
        ]);
        $f7 = ForeCast::updateOrCreate(['date' => '2020/12'],[
            'precipitation' => 94.361,
            'temperature' => 297.823,
        ]);
        $f8 = ForeCast::updateOrCreate(['date' => '2021/01'],[
            'precipitation' => 64.8647,
            'temperature' => 297.336,
        ]);


        $f9 = ForeCast::updateOrCreate(['date' => '2021/02'],[
            'precipitation' => 65.011,
            'temperature' => 298.174,
        ]);
        $f10 = ForeCast::updateOrCreate(['date' => '2021/03'],[
            'precipitation' => 62.0999,
            'temperature' => 299.932,
        ]);
        $f11 = ForeCast::updateOrCreate(['date' => '2021/04'],[
            'precipitation' => 66.6072,
            'temperature' => 301.142,
        ]);
        $f12 = ForeCast::updateOrCreate(['date' => '2021/05'],[
            'precipitation' => 157.602,
            'temperature' => 301.443,
        ]);

        DB::commit();

    }
}
