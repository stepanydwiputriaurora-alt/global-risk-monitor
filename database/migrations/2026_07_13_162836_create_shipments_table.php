<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {

            $table->id();

            $table->string('tracking_number')->unique();
            $table->string('product_name');

            $table->string('origin_country');
            $table->string('destination_country');

            $table->string('origin_port');
            $table->string('destination_port');

            $table->string('current_country')->nullable();
            $table->string('current_port')->nullable();

            $table->string('container_number')->nullable();

            $table->enum('status', [
                'Pending',
                'In Transit',
                'Delayed',
                'Arrived'
            ])->default('Pending');

            $table->date('estimated_arrival');
            $table->date('actual_arrival')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};