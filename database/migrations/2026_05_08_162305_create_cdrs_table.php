<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cdrs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('account_id');

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->string('call_id', 100)->unique();
            $table->string('source', 50);
            $table->string('destination', 50);
            $table->string('destination_prefix', 20);
            $table->dateTime('call_date');
            $table->integer('duration');
            $table->integer('billsec');
            $table->string('disposition', 50);
            $table->decimal('cost', 10, 4);
            $table->decimal('carrier_cost', 10, 4);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('cdrs');
    }
};
