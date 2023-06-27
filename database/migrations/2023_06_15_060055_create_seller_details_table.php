<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            //company owner field name is in the users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('address', 100)->nullable();
            $table->string('number', 15)->nullable();
            //company field
            $table->string('company_name', 30)->nullable();
            $table->string('company_fax', 30)->nullable();
            $table->string('license_number', 50)->nullable();
            $table->string('company_address', 100)->nullable();
            $table->string('company_number', 15)->nullable();
            $table->string('company_email', 30)->nullable();
            //bank field
            $table->string('account_name', 30)->nullable();
            $table->string('account_number', 30)->nullable();
            $table->string('bank_name', 30)->nullable();
            $table->string('bank_code', 15)->nullable();
            $table->string('branch_name', 30)->nullable();
            $table->string('branch_code', 15)->nullable();
            $table->string('bank_address', 100)->nullable();
            $table->float('sales_commission')->nullable();
            $table->double('paid_amount', 15, 3)->nullable()->default(0);
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
        Schema::dropIfExists('seller_details');
    }
}
