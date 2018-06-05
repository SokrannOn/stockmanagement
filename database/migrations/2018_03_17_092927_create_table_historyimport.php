<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHistoryimport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historyimports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('import_id');
            $table->integer('productlist_id');
            $table->integer('qty');
            $table->float('landinprice');
            $table->date('mdf');
            $table->date('expd');
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
        Schema::dropIfExists('historyimport');
    }
}
