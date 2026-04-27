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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies','id')->cascadeOnDelete();
            $table->enum('type', ['pickup', 'warehouse','billing'])->default('pickup');
            $table->string('title')->default('Main Shop');
            $table->string('address_line1');
            $table->string('address_line2')->nullable();
            $table->string('address_line3')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postcode');
            $table->string('country_code', 2);
            $table->foreign('country_code')->references('iso_code')->on('countries')->restrictOnDelete();
            $table->boolean('is_default')->default(false);
            $table->string('contact_name')->nullable();
            $table->string('phone',20)->nullable();
            $table->string('email',150)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['company_id', 'type']);
            $table->index('country_code');
            $table->index('postcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
