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
        Schema::create('company_couriers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies','id')->cascadeOnDelete();
            $table->foreignId('courier_id')->constrained('couriers','id')->cascadeOnDelete();
            $table->boolean('is_active')->default(true);

            // future-ready (you WILL need this)
            $table->json('config')->nullable();
            // API keys, account numbers, etc.

            $table->timestamps();

            $table->unique(['company_id', 'courier_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_couriers');
    }
};
