<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('reseller_id')->nullable();
            $table->string('account_type')->default('prepaid');
            $table->string('company_name');
            $table->string('email')->unique();
            $table->string('phone', 50)->nullable();
            $table->string('country', 100)->nullable();
            $table->text('address')->nullable();
            $table->decimal('credit_limit', 12, 2)->default(0);
            $table->string('auth_type')->default('sip');
            $table->string('sip_username', 100)->nullable();
            $table->string('sip_password', 100)->nullable();
            $table->string('tenant')->default('cgrates.org');
            $table->string('cgrates_account', 100)->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
            
            $table->foreign('reseller_id')->references('id')->on('resellers')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
