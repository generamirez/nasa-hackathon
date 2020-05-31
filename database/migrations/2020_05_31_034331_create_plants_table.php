<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('scientific_name');
            $table->text('variety');
            $table->float('min_grow_temp', 5,2);
            $table->float('opt_grow_temp', 5,2);
            $table->text('image')->nullable();
            $table->text('tips')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plants');
    }
}
