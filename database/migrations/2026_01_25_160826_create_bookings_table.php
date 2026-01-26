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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            // Relasi dengan tabel layanan
            $table->unsignedBigInteger('service_id');
            // Relasi dengan Barber
            $table->unsignedBigInteger('barber_id');
            // Tanggal dan jam booking
            $table->date('booking_date');
            $table->time('booking_time');
            // status dp pembayaran
            $table->boolean('payment_status')->default(false);
            // catatan
            $table->text('notes')->nullable();
            // metode pembayaran
            $table->enum('payment_method', ['bca', 'mandiri', 'bni', 'dana', 'qris', 'bri']);
            // bukti pembayaran dp
            $table->string('proof_of_payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
