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
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('pickup_address_id')->constrained('addresses')->restrictOnDelete();
            $table->json('delivery_address_json');
            $table->string('destination_country',2);
            $table->foreign('destination_country')
                ->references('iso_code')
                ->on('countries')->restrictOnDelete();
            // Courier selection
            $table->foreignId('company_courier_service_id')->constrained('company_courier_services')
                ->cascadeOnDelete();

            $table->string('service_name')->nullable(); // snapshot

            $table->decimal('total_weight',10,3)->default(0);
            $table->decimal('total_amount',10,2)->default(0);

            $table->enum('status', [
                'draft',
                'booked',
                'processing',
                'label_generated',
                'shipped',
                'in_transit',
                'delivered',
                'cancelled',
            ])->default('draft');

            $table->string('reference')->nullable(); // internal ref
            $table->string('tracking_number')->unique()->nullable();


            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('status');
            $table->index('destination_country');
            $table->index('company_id');
            $table->index('user_id');
            $table->index('pickup_address_id');
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
