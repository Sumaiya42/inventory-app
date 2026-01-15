<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add 'name' column if it doesn't exist
        if (!Schema::hasColumn('inventories', 'name')) {
            Schema::table('inventories', function (Blueprint $table) {
                $table->string('name')->after('id')->default('Unnamed Inventory');
            });
        }
    }

    public function down(): void
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
};
