<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemedialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remedial', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('siswa_id');
            $table->bigInteger('nilai_id');
            $table->text('thumbnail')->nullable();
            $table->text('pesan');
          $table->enum('status', ['proses', 'selesai'])->nullable();
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
        Schema::dropIfExists('remedial');
    }
}
