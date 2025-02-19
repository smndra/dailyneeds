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
        Schema::create('transaction_headers', function (Blueprint $table) {
            $table->id('transaction_id')->unique();
            $table->dateTime('transaction_date', precision: 0);
            $table->decimal('transaction_total_price', total: 12, places: 2);
            $table->enum('transaction_status', ['Pending', 'Completed', 'Cancelled']);
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->timestamps();

            $table->foreign('customer_id')->references('customer_id')->on('ms_customers')->onDelete('cascade');
            $table->foreign('admin_id')->references('admin_id')->on('ms_admins')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('payment_method_id')->on('ms_payment_methods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_headers');
    }
};
