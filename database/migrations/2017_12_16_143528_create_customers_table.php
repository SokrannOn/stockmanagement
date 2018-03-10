<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('khname');
            $table->string('engname');
            $table->string('contact');
            $table->integer('province_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('commune_id')->nullable();
            $table->integer('village_id')->nullable();
            $table->string('homeno')->nullable();
            $table->string('streetno')->nullable();
            $table->integer('channel_id');
            $table->integer('user_id');
            $table->tinyInteger('active');
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
        Schema::dropIfExists('customers');
    }
}
