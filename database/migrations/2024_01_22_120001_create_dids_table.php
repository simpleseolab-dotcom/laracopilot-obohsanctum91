<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dids', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number', 20)->unique();
            $table->string('country_code', 5);
            $table->enum('did_type', ['voice_only', 'sms_only', 'voice_sms'])->default('voice_only');
            $table->enum('route_to_type', ['extension', 'ivr', 'queue', 'external']);
            $table->unsignedBigInteger('route_to_id')->nullable();
            $table->string('external_number', 20)->nullable();
            $table->boolean('recording_enabled')->default(false);
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dids');
    }
};