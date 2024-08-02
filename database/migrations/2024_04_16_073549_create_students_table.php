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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->foreignId('ta_id')->constrained('tajs');
            $table->string('nama');
            $table->integer('umur');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('asal_sekolah');
            $table->string('npu')->unique();
            $table->integer('tahun_lulus');
            $table->string('nisn')->unique();
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('nik_ayah');
            $table->string('nik_ibu');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->enum('status', ['baru', 'pindahan'])->default('baru');
            $table->enum('jenjang', ['mts', 'ma']);
            $table->enum('kelas', ['I', 'II', 'III'])->default('I');
            $table->string('kontak')->nullable()->unique();
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
