<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMinimumOptimalToPlants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plants', function (Blueprint $table) {
            $table->float('min_opt_grow_temp', 5,2)->default(300.00);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plants', function (Blueprint $table) {
            $table->dropColumn('min_opt_grow_temp');
        });
    }
}
