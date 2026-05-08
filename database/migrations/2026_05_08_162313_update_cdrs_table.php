<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('cdrs', function (Blueprint $table) {
            $table->renameColumn('account_id', 'customer_id');
        });
        
        Schema::table('cdrs', function (Blueprint $table) {
            $table->uuid('gateway_id')->nullable()->after('customer_id');
            $table->uuid('did_id')->nullable()->after('gateway_id');
            $table->string('direction')->default('outbound')->after('call_id');
            $table->integer('initial_interval')->default(0)->after('duration');
            $table->integer('grace_time')->default(0)->after('initial_interval');
            $table->decimal('sell_rate', 10, 4)->default(0)->after('cost');
            $table->decimal('buy_rate', 10, 4)->default(0)->after('sell_rate');
            $table->decimal('profit', 10, 4)->default(0)->after('carrier_cost');
            $table->string('hangup_cause')->nullable()->after('disposition');
            $table->string('sip_code')->nullable()->after('hangup_cause');
            
            $table->foreign('gateway_id')->references('id')->on('gateways')->onDelete('set null');
            $table->foreign('did_id')->references('id')->on('dids')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::table('cdrs', function (Blueprint $table) {
            $table->dropForeign(['gateway_id']);
            $table->dropForeign(['did_id']);
            $table->dropColumn(['gateway_id', 'did_id', 'direction', 'initial_interval', 'grace_time', 'sell_rate', 'buy_rate', 'profit', 'hangup_cause', 'sip_code']);
            $table->renameColumn('customer_id', 'account_id');
        });
    }
};
