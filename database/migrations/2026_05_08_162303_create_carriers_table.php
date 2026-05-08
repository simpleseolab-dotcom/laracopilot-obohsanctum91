<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('carriers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('tech_prefix', 20);
            $table->string('host');
            $table->integer('port');
            $table->string('username', 100)->nullable();
            $table->string('password', 100)->nullable();
            $table->string('codec', 50);
            $table->integer('max_channels');
            $table->integer('priority');
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('carriers');
    }
};
