<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumToDeliverymensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deliverymens', function (Blueprint $table) {
            $table->string('num', 20)->after('region_id'); // Adjust the length as needed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deliverymens', function (Blueprint $table) {
            $table->dropColumn('num');
        });
    }
}
