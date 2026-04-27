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
        Schema::create('company_courier_services', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_courier_id')->constrained('company_couriers','id')->cascadeOnDelete();

            $table->string('service_name'); // Express, Standard
            $table->string('service_code')->nullable(); // express, standard

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->unique(['company_courier_id', 'service_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_courier_services');
    }
};
