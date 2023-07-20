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
        /**Membuat tabel surat */
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pengirim')->unsigned();
            $table->string('nomorsurat');
            $table->enum('jenis',['Masuk','Keluar']);
            $table->date('tanggal');
            $table->string('document');
            $table->string('nomoragenda');
            $table->string('perihal');
            $table->string('asal');
            $table->string('diteruskan');
            $table->timestamps();
        });

        Schema::table('surats',function (Blueprint $table){
            $table->foreign('pengirim')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
