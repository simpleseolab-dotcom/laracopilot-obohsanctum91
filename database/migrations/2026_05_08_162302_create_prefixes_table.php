<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('prefixes', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->string('prefix', 20)->unique();

            $table->string('country', 100);

            $table->string('country_code', 5);

            $table->string('destination', 255);

            $table->string('status')->default('active');

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('prefixes');
    }
};
