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
            $table->string('booking_code')->unique();
            $table->string('name');
            $table->string('phone');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('barber_id');
            $table->date('booking_date');
            $table->time('booking_time');
            $table->enum('status', [
                'waiting_payment',
                'waiting_verification',
                'confirmed',
                'rejected',
                'expired',
                'completed',
            ])->default('waiting_payment');
            $table->text('notes')->nullable();
            $table->enum('payment_method', ['bca', 'mandiri', 'bni', 'dana', 'qris', 'bri'])->nullable();
            $table->string('payment_proof')->nullable();
            $table->integer('dp_amount');
            $table->integer('total_price');
            $table->timestamp('verified_at')->nullable();
            $table->index(['booking_date', 'booking_time']);
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
