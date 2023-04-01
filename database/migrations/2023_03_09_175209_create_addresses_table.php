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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            
            $table->integer('user_id');
            $table->string('fullname');
            $table->string('phone');
            $table->string('division');
            $table->string('district');
            $table->string('sub_district');
            $table->string('union')->nullable();
            $table->string('holding')->nullable();
            $table->string('area');
            $table->string('street_address');
            $table->string('zipcode');
            $table->integer('default')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
