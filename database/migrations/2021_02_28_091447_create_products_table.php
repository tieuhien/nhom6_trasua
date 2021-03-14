<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HienTaobangProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create ('products', function(Blueprint $table){
            $table->increments('id');
            $table->integer('catalogs_id');
            $table->string('name');
            $table->integer('price');
            $table->string('image_link')unsigned()->nullable()->change();
            $table->string('image_list')unsigned()->nullable()->change();
            $table->date('created_at');
            $table->integer('view')default('0');
            $table->string('size');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::drop('products');
    }
}
