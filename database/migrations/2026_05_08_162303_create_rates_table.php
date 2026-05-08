<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('prefix_id');

            $table->foreign('prefix_id')->references('id')->on('prefixes')->onDelete('cascade');
            $table->uuid('carrier_id');

            $table->foreign('carrier_id')->references('id')->on('carriers')->onDelete('cascade');
            $table->decimal('rate_per_minute', 10, 4);
            $table->decimal('connection_fee', 10, 4)->nullable();
            $table->integer('billing_increment');
            $table->integer('min_duration');
            $table->date('effective_date');
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rates');
    }
};
