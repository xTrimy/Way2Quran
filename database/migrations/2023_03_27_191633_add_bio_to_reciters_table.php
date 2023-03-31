<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reciters', function (Blueprint $table) {
            $table->text('bio')->nullable();
            $table->text('bio_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reciters', function (Blueprint $table) {
            $table->dropColumn('bio');
            $table->dropColumn('bio_en');
        });
    }
};
