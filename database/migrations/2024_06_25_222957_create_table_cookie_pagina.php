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
        Schema::create('cookie_pagina', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('ip_address');
            $table->string('user_id');
            $table->string('pagina');
            $table->integer('tempo_pagina');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cookie_pagina');
    }
};
