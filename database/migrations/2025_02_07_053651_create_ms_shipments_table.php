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
        Schema::create('ms_shipments', function (Blueprint $table) {
            $table->id('shipment_id');
            $table->text('shipment_address');
            $table->dateTime('shipment_date_start', precision: 0);
            $table->dateTime('shipment_date_end', precision: 0);
            $table->string('shipment_recipient', length: 200);
            $table->enum('shipment_status', ['Pending', 'Completed']);
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('courier_id');
            $table->timestamps();

            $table->foreign('transaction_id')->references('transaction_id')->on('transaction_headers')->onDelete('cascade');
            $table->foreign('courier_id')->references('courier_id')->on('ms_couriers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_shipments');
    }
};
