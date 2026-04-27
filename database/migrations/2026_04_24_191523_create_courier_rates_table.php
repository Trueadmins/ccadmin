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
        Schema::create('courier_rates', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_courier_service_id')
                ->constrained('company_courier_services','id')
                ->cascadeOnDelete();

            $table->foreignId('country_id')->constrained('countries','id')
                ->cascadeOnDelete();

            $table->enum('parcel_type', ['envelope', 'parcel','pallet','document'])
                ->default('parcel');

            $table->decimal('weight_from', 10, 3);
            $table->decimal('weight_to', 10, 3);

            $table->decimal('rate', 10, 2);

            $table->timestamps();

            $table->index(
                ['company_courier_service_id', 'country_id', 'parcel_type'],
                'cr_ccs_country_parcel_idx'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_rates');
    }
};
