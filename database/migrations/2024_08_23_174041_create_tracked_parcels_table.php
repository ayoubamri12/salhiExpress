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
        Schema::create('tracked_parcels', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->string("state");
            $table->string("status");
            $table->string("infos");
            $table->string("action_by");
            $table->unsignedBigInteger("coli_id")->nullable();
            $table->foreign("coli_id")->references("id")->on("colis")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracked_parcels');
    }
};
