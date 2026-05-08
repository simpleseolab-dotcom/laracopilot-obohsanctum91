<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('gateways', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('carrier_name')->nullable();
            $table->string('tech_prefix', 20);
            $table->string('host');
            $table->integer('port')->default(5060);
            $table->string('transport')->default('UDP');
            $table->string('username', 100)->nullable();
            $table->string('password', 100)->nullable();
            $table->string('codecs')->default('PCMU,PCMA,G729');
            $table->integer('max_channels')->default(0);
            $table->integer('cps_limit')->default(0);
            $table->integer('priority')->default(1);
            $table->decimal('asr_threshold', 5, 2)->default(0);
            $table->decimal('acd_threshold', 8, 2)->default(0);
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('gateways');
    }
};
