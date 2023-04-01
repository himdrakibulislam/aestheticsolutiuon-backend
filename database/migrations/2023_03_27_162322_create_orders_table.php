<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
           
            $table->integer('order_number');
            $table->string('name');
            $table->integer('user_id');
            $table->string('phone');
            $table->string('division');
            $table->string('district');
            $table->string('sub_district');
            $table->string('address');
            $table->integer('total');
            $table->string('payment_type')->nullable();
            $table->integer('zipcode')->nullable();
            $table->integer('order_status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
