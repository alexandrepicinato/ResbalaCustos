<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('buzzinesinfos', function (Blueprint $table) {
            $table->id();
            $table->string('corporation_name');
            $table->string('buzzinelogo');
            $table->string('corporative_site');
            $table->string('filtrerTag');
        });
        Schema::create('productsinfos', function (Blueprint $table) {
            $table->id();
            $table->string('productname');
            $table->string('productimage');
            $table->string('token', 64)->unique();
            $table->string('descriptions_product');
        });
        Schema::create('scrapplinks', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('bussine_id');
            $table->string('captive_link');
            $table->string('buyurl');
            $table->timestamps();
        });
        Schema::create('historyPrices', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('bussine_id');
            $table->string('captive_link');
            $table->string('currentprice');
            $table->string('observation');
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
        //
    }
};
