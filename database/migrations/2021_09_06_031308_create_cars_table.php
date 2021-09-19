<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('body_style_id');
            $table->unsignedBigInteger('color_id');
            $table->string('title')->nullable();
            $table->string('stock_no')->unique()->nullable();
            $table->date('model_year')->nullable();
            $table->date('car_up_date')->nullable();
            $table->float('mileage', 8, 2)->nullable();
            $table->string('repaired')->nullable();
            $table->string('steering')->nullable();
            $table->string('transmission')->nullable();
            $table->string('fuel')->nullable();
            $table->tinyInteger('drive_system')->nullable();
            $table->tinyInteger('doors')->nullable();
            $table->string('displacement')->nullable();
            $table->string('chassis_no')->nullable();
            $table->string('model_code')->nullable();
            $table->string('car_location')->nullable();
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
        Schema::dropIfExists('cars');
    }
}
