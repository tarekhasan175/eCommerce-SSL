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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->string('total');
            $table->string('vat');
            $table->string('payable');
            $table->string('cus_details');
            $table->string('ship_details');
            $table->string('tran_id');
            $table->string('val_id')->default('0');
            $table->enum('delivery_status', ['Pending','Processing', 'Completed']);
            $table->string('payment_status');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete()->restrictOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
