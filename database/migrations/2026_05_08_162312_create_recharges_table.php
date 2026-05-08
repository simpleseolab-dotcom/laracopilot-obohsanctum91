<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recharges', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('customer_id');
            $table->string('recharge_type');
            $table->decimal('amount', 12, 4);
            $table->string('currency', 10)->default('USD');
            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->uuid('voucher_id')->nullable();
            $table->text('notes')->nullable();
            $table->uuid('processed_by')->nullable();
            $table->string('status')->default('completed');
            $table->timestamps();
            
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('recharges');
    }
};
