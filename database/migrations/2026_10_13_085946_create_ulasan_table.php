
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ulasan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')
                ->unique()
                ->constrained('bookings')
                ->cascadeOnDelete();
            $table->foreignId('siswa_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('tutor_profile_id')
                ->constrained('tutor_profiles')
                ->cascadeOnDelete();
            $table->unsignedTinyInteger('rating');
            $table->text('komentar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};