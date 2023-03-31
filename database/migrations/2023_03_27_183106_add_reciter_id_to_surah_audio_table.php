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
        Schema::table('surah_audio', function (Blueprint $table) {
            $table->foreignId('reciter_id')->nullable()->constrained('reciters')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surah_audio', function (Blueprint $table) {
            $table->dropForeign(['reciter_id']);
            $table->dropColumn('reciter_id');
        });
    }
};
