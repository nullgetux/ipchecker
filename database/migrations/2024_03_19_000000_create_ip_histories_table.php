<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ip_histories', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->text('user_agent');
            $table->timestamp('hit_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ip_histories');
    }
}; 