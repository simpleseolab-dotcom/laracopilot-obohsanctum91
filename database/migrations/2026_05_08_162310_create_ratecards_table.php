<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ratecards', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->uuid('prefix_id');
            $table->uuid('gateway_id')->nullable();
            $table->uuid('customer_id')->nullable();
            $table->string('rate_type')->default('sell');
            $table->decimal('rate_per_minute', 10, 4);
            $table->decimal('connection_fee', 10, 4)->default(0);
            $table->integer('billing_increment')->default(1);
            $table->integer('min_duration')->default(0);
            $table->integer('grace_time')->default(0);
            $table->date('effective_date');
            $table->date('expiry_date')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
            
            $table->foreign('prefix_id')->references('id')->on('prefixes')->onDelete('cascade');
            $table->foreign('gateway_id')->references('id')->on('gateways')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ratecards');
    }
};
