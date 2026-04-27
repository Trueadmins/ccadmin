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
        Schema::create('shipment_boxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipment_id')->constrained('shipments')->cascadeOnDelete();
            $table->enum('parcel_type', ['envelope', 'parcel','pallet','document'])
                ->default('parcel');

            $table->decimal('actual_weight', 10, 3); // kg

            $table->decimal('length', 10, 2)->nullable(); // cm
            $table->decimal('width', 10, 2)->nullable(); // cm
            $table->decimal('height', 10, 2)->nullable(); // cm

            $table->decimal('volumetric_weight', 10, 3)->nullable();
            $table->decimal('chargeable_weight', 10, 3)->default(0);
            $table->integer('quantity')->default(1);
            $table->integer('sequence')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();

            $table->index('shipment_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipment_boxes');
    }
};
