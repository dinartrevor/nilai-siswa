<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRangkingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rangking', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('nilai_id')->nullable();
            $table->bigInteger('siswa_id')->nullable();
            $table->string('rangking1')->nullable();
            $table->string('rangking2')->nullable();
            $table->string('rangking3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rangking');
    }
}