<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceCalculatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_calculators', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('port');
            $table->float('delivery_charge', 8, 2);
            $table->float('marine_insurance', 8, 2);
            $table->float('pre_export_inspection', 8, 2);
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
        Schema::dropIfExists('price_calculators');
    }
}
