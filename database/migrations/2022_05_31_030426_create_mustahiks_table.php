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
        Schema::create('mustahiks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('unique_number')->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->date('tl');
            $table->string('t_lahir');
            $table->string('alamat');
            $table->bigInteger('no_hpM');
            $table->string('f_foto');
            $table->string('surat_pengantar');
            $table->string('f_kk');
            $table->string('f_ktp');
            $table->foreignId('masjid');
            $table->tinyInteger('ket');
            $table->foreignId('created_by');
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
        Schema::dropIfExists('mustahiks');
    }
};
