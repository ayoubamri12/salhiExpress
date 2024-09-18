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
            $table->string("code");
            $table->string("destination");
            $table->string("phone_number");
            $table->string("Name");
            $table->string("state");
            $table->string("status");
            $table->string("price");
            $table->string("magasin");
            $table->string("qr_code");
            $table->string("adress");
            $table->string("accessibility");
            $table->string("changable");
            $table->timestamp("shipping_date");
            $table->timestamp("delay");
            $table->unsignedBigInteger("deliverymen_id")->nullable();
            $table->unsignedBigInteger("return_id")->nullable();
            $table->unsignedBigInteger("payment_id")->nullable();
            $table->foreign("deliverymen_id")->references("id")->on("deliverymens")->onDelete("cascade");
            $table->foreign("return_id")->references("id")->on("returns")->onDelete("cascade");
            $table->foreign("payment_id")->references("id")->on("payments")->onDelete("cascade");
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
