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
        Schema::create('colis', function (Blueprint $table) {
            $table->id();
            $table->string("destination");
            $table->string("phone_number");
            $table->string("product");
            $table->string("state");
            $table->string("price");
            $table->string("to_pay");
            $table->string("status");
            $table->string("returned");
            $table->string("delivery_price");
            $table->unsignedBigInteger("deliverymen_id");
            $table->string("company");
            $table->foreign("deliverymen_id")->references("id")->on("deliverymens")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colis');
    }
};
