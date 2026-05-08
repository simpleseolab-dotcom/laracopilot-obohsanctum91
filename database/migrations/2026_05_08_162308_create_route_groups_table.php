<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('route_groups', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('routing_strategy')->default('lcr');
            $table->boolean('enable_failover')->default(true);
            $table->boolean('asr_filtering')->default(false);
            $table->decimal('min_asr', 5, 2)->default(0);
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('route_groups');
    }
};
