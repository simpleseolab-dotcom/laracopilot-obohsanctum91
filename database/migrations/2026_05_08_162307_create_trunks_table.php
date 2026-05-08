<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trunks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('trunk_type');
            $table->uuid('customer_id')->nullable();
            $table->string('name');
            $table->string('tech_prefix', 20)->nullable();
            $table->string('host');
            $table->integer('port')->default(5060);
            $table->string('transport')->default('UDP');
            $table->string('username', 100)->nullable();
            $table->string('password', 100)->nullable();
            $table->string('codecs')->default('PCMU,PCMA,G729');
            $table->integer('cps_limit')->default(0);
            $table->integer('concurrent_limit')->default(0);
            $table->string('direction')->default('both');
            $table->integer('priority')->default(1);
            $table->string('status')->default('active');
            $table->timestamps();
            
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('trunks');
    }
};
