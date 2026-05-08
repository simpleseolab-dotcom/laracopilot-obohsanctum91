<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('auto_refill', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('customer_id');
            $table->boolean('enabled')->default(false);
            $table->decimal('threshold_amount', 12, 4);
            $table->decimal('refill_amount', 12, 4);
            $table->string('payment_method');
            $table->string('payment_token')->nullable();
            $table->timestamp('last_refill_at')->nullable();
            $table->integer('refill_count')->default(0);
            $table->timestamps();
            
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->unique('customer_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('auto_refill');
    }
};
