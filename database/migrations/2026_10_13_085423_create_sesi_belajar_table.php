
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sesi_belajar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')
                ->unique()
                ->constrained('bookings')
                ->cascadeOnDelete();
            $table->string('link_video')->nullable();
            $table->dateTime('waktu_mulai')->nullable();
            $table->dateTime('waktu_selesai')->nullable();
            $table->string('status_sesi', 20)->default('terjadwal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sesi_belajar');
    }
};