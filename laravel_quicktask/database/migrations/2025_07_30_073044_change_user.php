<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('fname')->after('username')->nullable()->change();
            $table->string('lname')->after('fname')->nullable()->change();
            $table->string('phone')->after('lname')->nullable()->change();
            $table->string('live_at')->after('phone')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('fname')->after('username')->change();
            $table->string('lname')->after('fname')->change();
            $table->string('phone')->after('lname')->change();
            $table->string('live_at')->after('phone')->change();
        });
    }
};
