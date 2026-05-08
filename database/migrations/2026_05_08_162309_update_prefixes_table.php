<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('prefixes', function (Blueprint $table) {
            $table->uuid('route_group_id')->nullable()->after('status');
            $table->integer('min_duration')->default(0)->after('destination');
            $table->integer('billing_increment')->default(1)->after('min_duration');
            
            $table->foreign('route_group_id')->references('id')->on('route_groups')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::table('prefixes', function (Blueprint $table) {
            $table->dropForeign(['route_group_id']);
            $table->dropColumn(['route_group_id', 'min_duration', 'billing_increment']);
        });
    }
};
