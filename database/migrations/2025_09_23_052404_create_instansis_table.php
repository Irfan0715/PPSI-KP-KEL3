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
        Schema::create('instansis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_instansi');
            $table->text('alamat');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('kode_pos')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('jenis_instansi'); // swasta, pemerintah, BUMN, dll
            $table->text('deskripsi')->nullable();
            $table->string('kontak_person')->nullable();
            $table->string('jabatan_kontak')->nullable();
            $table->string('no_hp_kontak')->nullable();
            $table->integer('kuota_mahasiswa')->default(0);
            $table->text('kebutuhan_keahlian')->nullable();
            $table->boolean('status_aktif')->default(true);
            $table->json('fasilitas')->nullable(); // menyimpan array fasilitas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instansis');
    }
};
