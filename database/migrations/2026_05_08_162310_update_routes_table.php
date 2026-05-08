<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('routes', function (Blueprint $table) {
            $table->renameColumn('carrier_id', 'gateway_id');
        });
        
        Schema::table('routes', function (Blueprint $table) {
            $table->uuid('gateway_id')->change();
            $table->uuid('route_group_id')->nullable()->after('gateway_id');
            $table->decimal('cost_rate', 10, 4)->default(0)->after('weight');
            $table->boolean('is_failover')->default(false)->after('cost_rate');
            
            $table->foreign('gateway_id')->references('id')->on('gateways')->onDelete('cascade');
            $table->foreign('route_group_id')->references('id')->on('route_groups')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::table('routes', function (Blueprint $table) {
            $table->dropForeign(['gateway_id']);
            $table->dropForeign(['route_group_id']);
            $table->dropColumn(['route_group_id', 'cost_rate', 'is_failover']);
            $table->renameColumn('gateway_id', 'carrier_id');
        });
    }
};
