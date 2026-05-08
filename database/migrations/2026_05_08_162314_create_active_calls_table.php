<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('active_calls', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('call_uuid', 100)->unique();
            $table->uuid('customer_id')->nullable();
            $table->uuid('gateway_id')->nullable();
            $table->string('direction');
            $table->string('caller_id', 50);
            $table->string('destination', 50);
            $table->string('destination_prefix', 20);
            $table->timestamp('call_start');
            $table->integer('duration')->default(0);
            $table->decimal('current_cost', 10, 4)->default(0);
            $table->decimal('reserved_balance', 10, 4)->default(0);
            $table->string('status')->default('active');
            $table->timestamps();
            
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('gateway_id')->references('id')->on('gateways')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('active_calls');
    }
};
