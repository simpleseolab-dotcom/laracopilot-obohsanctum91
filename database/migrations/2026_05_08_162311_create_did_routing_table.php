<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('did_routing', function (Blueprint $table) {

            $table->uuid('id')->primary();

            $table->uuid('did_id');

            $table->string('routing_type');

            $table->string('destination');

            $table->string('sip_uri')->nullable();

            $table->string('extension')->nullable();

            $table->uuid('ivr_id')->nullable();

            $table->uuid('ring_group_id')->nullable();

            $table->integer('priority')->default(1);

            $table->json('time_conditions')->nullable();

            $table->string('status')->default('active');

            $table->timestamps();

            $table->foreign('did_id')
                ->references('id')
                ->on('dids')
                ->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('did_routing');
    }
};
