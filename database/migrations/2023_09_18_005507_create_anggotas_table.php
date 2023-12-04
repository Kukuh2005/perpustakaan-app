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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->char('kode', 20);
            $table->char('nama', 100);
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->char('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->char('telepon', 15);
            $table->text('alamat');
            $table->char('foto', 255);
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
        Schema::dropIfExists('anggotas');
    }
};
