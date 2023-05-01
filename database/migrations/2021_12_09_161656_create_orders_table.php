<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();            
            $table->integer("order_number")->unsigned();
            $table->unsignedBigInteger("user_id");
            $table->dateTime('order_date')->nullable();
            $table->dateTime('cancel_datetime')->nullable()->comment('By Customer');
            $table->tinyInteger("payment_type")->comment("1 - cash, 2 - card");
            $table->unsignedBigInteger("delivery_address_id")->nullable();
            $table->unsignedDouble("item_total_price")->default(0)->comment('Total Item Price without Delivery Charge Item');
            $table->unsignedDouble("delivery_charge")->default(0)->comment('Delivery Charge if any');
            $table->unsignedDouble("item_consumption_tax")->default(0)->comment('Item Consumption Tax');
            $table->unsignedDouble("total_quantity")->default(0)->comment('Total Quantity of all items');
            $table->unsignedDouble("total_price")->default(0)->comment('Total Price of all items, Tax and Delivery Charge');
            $table->tinyInteger("status")->default(2)->comment('1 - Cancel, 2 - Preparing, 3 - Prepared/Heading Deliver, 4 - Received' );
            $table->tinyInteger("transaction_status")->default(1)->comment('1 - Incomplete Transaction, 2 - Complete Transaction');
            $table->string("transaction_id", 200)->nullable();
            $table->tinyInteger("isPaid")->default(0)->comment("0 - unpaid, 1 - paid");
            $table->unsignedBigInteger('created_by')->comment("Created by User Id");
            $table->unsignedBigInteger('updated_by')->nullable()->comment("Updated by User Id");
            $table->unsignedBigInteger('deleted_by')->nullable()->comment("Cancelled by User Id");          
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
        Schema::dropIfExists('orders');
    }
}
