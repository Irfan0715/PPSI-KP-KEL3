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
        Schema::table('nilai', function (Blueprint $table) {
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa')->onDelete('cascade');
            $table->foreignId('dosen_id')->nullable()->constrained('dosen')->onDelete('set null');
            $table->foreignId('pembimbing_lapangan_id')->nullable()->constrained('pembimbing_lapangan')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nilai', function (Blueprint $table) {
            $table->dropForeign(['mahasiswa_id']);
            $table->dropForeign(['dosen_id']);
            $table->dropForeign(['pembimbing_lapangan_id']);
        });
    }
};
