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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');        // India
            $table->string('iso_code', 2)->unique();    // IN
            $table->string('currency', 3)->nullable(); // GBP, INR
            $table->string('flag')->nullable();   // flag
            $table->string('phone_code')->nullable();
            $table->integer('sort_order')->default(0); //0
            $table->boolean('is_active')->default(false);
            $table->timestamps();

            $table->index(['is_active', 'sort_order']);
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
