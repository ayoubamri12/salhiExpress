<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('deliverymens', function (Blueprint $table) {
        $table->id();
        $table->string('firstName');
        $table->string('lastName');
        $table->unsignedBigInteger('region_id');
        $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
        $table->string('num'); // Add telephone number column

        $table->unsignedBigInteger('user_id')->nullable(); // Allow null values
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->nullable(); // Allow null values
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('deliverymens');
    }
};
