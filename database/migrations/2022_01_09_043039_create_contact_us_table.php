<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('company_name')->nullable();
            $table->string('country');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('phone_country_name')->nullable();
            $table->string('phone_country_code')->nullable();
            $table->text('comment')->nullable();
            $table->boolean('is_received_news')->default(false);
            $table->boolean('is_agreed')->default(false);
            $table->unsignedBigInteger('carId')->default(0);
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
        Schema::dropIfExists('contact_us');
    }
}
