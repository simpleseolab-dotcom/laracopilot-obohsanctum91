<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('customer_id');
            $table->decimal('balance', 12, 4)->default(0);
            $table->decimal('reserved_balance', 12, 4)->default(0);
            $table->string('currency', 10)->default('USD');
            $table->timestamp('last_updated')->useCurrent();
            $table->timestamps();
            
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->unique('customer_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('balances');
    }
};
