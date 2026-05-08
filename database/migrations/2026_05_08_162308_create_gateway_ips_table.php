<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('gateway_ips', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('gateway_id');
            $table->string('ip_address', 45);
            $table->integer('port')->default(5060);
            $table->integer('priority')->default(1);
            $table->string('status')->default('active');
            $table->timestamps();
            
            $table->foreign('gateway_id')->references('id')->on('gateways')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('gateway_ips');
    }
};
