
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tutor_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->unique()
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('mata_pelajaran_id')
                ->constrained('mata_pelajaran')
                ->cascadeOnDelete();
            $table->text('bio')->nullable();
            $table->unsignedInteger('pengalaman_tahun')->default(0);
            $table->decimal('tarif_per_jam', 12, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tutor_profiles');
    }
};