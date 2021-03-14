<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HienTaobangOderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create ('oderdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transactions_id');
            $table->integer('products_id');
            $table->integer('quantity');
            $table->integer('price');
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
        Schema::drop('oderdetails');
    }
}


