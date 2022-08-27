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
        Schema::create('hash_registres', function (Blueprint $table) {
            $table->id();
            $table->timestamp('batch');
            $table->bigInteger('block_sequency');
            $table->string('entrace_string');
            $table->string('find_key');
            $table->string('hash');
            $table->bigInteger('trys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hash_registres');
    }
};
