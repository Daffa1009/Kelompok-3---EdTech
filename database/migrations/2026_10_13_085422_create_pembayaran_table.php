
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')
                ->constrained('bookings')
                ->cascadeOnDelete();
            $table->string('metode', 50);
            $table->decimal('jumlah', 12, 2);
            $table->string('status_pembayaran', 20)->default('menunggu');
            $table->timestamp('tanggal_bayar')->nullable();
            $table->string('kode_transaksi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};