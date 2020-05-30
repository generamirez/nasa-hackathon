<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->float('price',10,2);
            $table->float('available',10,2);
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
        Schema::dropIfExists('sale_posts');
    }
}
