<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->boolean('is_founder')->default(false)->after('status');
            $table->boolean('is_stream_lead')->default(false)->after('is_founder');
        });
    }

    public function down(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->dropColumn(['is_founder', 'is_stream_lead']);
        });
    }
};
