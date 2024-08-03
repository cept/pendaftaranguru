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
        Schema::create('data_pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('tempat_lahir', 30);
            $table->date('tgl_lahir');
            $table->enum('agama', ['islam', 'kristen', 'hindu', 'budha', 'khonghucu']);
            $table->string('alamat', 50);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('no_hp', 20);
            $table->string('email', 50);
            $table->string('foto', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pendaftars');
    }
};
