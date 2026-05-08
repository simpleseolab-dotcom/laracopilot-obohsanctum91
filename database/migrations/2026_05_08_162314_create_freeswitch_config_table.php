<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('freeswitch_config', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('config_type');
            $table->string('name')->unique();
            $table->text('value');
            $table->text('description')->nullable();
            $table->boolean('enabled')->default(true);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('freeswitch_config');
    }
};
