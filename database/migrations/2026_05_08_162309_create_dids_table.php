<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dids', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('did_number', 20)->unique();
            $table->string('country', 100);
            $table->string('country_code', 5);
            $table->string('state', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->uuid('customer_id')->nullable();
            $table->decimal('monthly_cost', 10, 4)->default(0);
            $table->decimal('setup_cost', 10, 4)->default(0);
            $table->decimal('per_minute_cost', 10, 4)->default(0);
            $table->string('routing_type')->nullable();
            $table->string('destination')->nullable();
            $table->date('activation_date')->nullable();
            $table->date('next_billing_date')->nullable();
            $table->string('status')->default('available');
            $table->timestamps();
            
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dids');
    }
};
