<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductlistPurchaseorder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productlist_purchaseorder', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchaseorder_id');
            $table->integer('productlist_id');
            $table->integer('qty');
            $table->double('unitPrice');
            $table->double('amount');
            $table->integer('user_id');
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
        Schema::dropIfExists('productlist_purchaseorder');
    }
}
