
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('tutor_profile_id')
                ->constrained('tutor_profiles')
                ->cascadeOnDelete();
            $table->foreignId('jadwal_tutor_id')
                ->constrained('jadwal_tutor')
                ->cascadeOnDelete();
            $table->decimal('total_harga', 12, 2);
            $table->string('status_booking', 20)->default('menunggu');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};