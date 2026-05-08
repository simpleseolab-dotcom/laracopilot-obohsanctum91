<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('resellers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('parent_id')->nullable();
            $table->string('company_name');
            $table->string('email')->unique();
            $table->string('phone', 50)->nullable();
            $table->string('country', 100)->nullable();
            $table->text('address')->nullable();
            $table->decimal('commission_rate', 5, 2)->default(0);
            $table->decimal('credit_limit', 12, 2)->default(0);
            $table->string('status')->default('active');
            $table->timestamps();
            
            $table->foreign('parent_id')->references('id')->on('resellers')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('resellers');
    }
};
