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
    Schema::create('shipments', function (Blueprint $table) {
        $table->id();

        $table->string('tracking_number')->unique();
        $table->string('product_name');

        // Negara asal & tujuan
        $table->string('origin_country');
        $table->string('destination_country');

        // Pelabuhan asal & tujuan
        $table->string('origin_port');
        $table->string('destination_port');

        // Lokasi saat ini
        $table->string('current_country')->nullable();
        $table->string('current_port')->nullable();

        // Nomor container (opsional tapi bagus untuk demo)
        $table->string('container_number')->nullable();

        // Status pengiriman
        $table->enum('status', [
            'Pending',
            'In Transit',
            'Delayed',
            'Arrived'
        ])->default('Pending');

        // Estimasi & realisasi
        $table->date('estimated_arrival');
        $table->date('actual_arrival')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
