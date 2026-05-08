<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('prefix_id');

            $table->foreign('prefix_id')->references('id')->on('prefixes')->onDelete('cascade');
            $table->uuid('carrier_id');

            $table->foreign('carrier_id')->references('id')->on('carriers')->onDelete('cascade');
            $table->integer('priority');
            $table->integer('weight');
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('routes');
    }
};
