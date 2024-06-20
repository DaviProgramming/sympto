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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('login');
            $table->string('senha');
            $table->string('estado');
            $table->string('tipo', 3);
        });

        DB::table('users')->insert([
            [
                'login' => 'admin',
                'senha' => 'admin123', 
                'estado' => 'ativo',
                'tipo' => 'adm', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'login' => 'user1',
                'senha' => 'user1234', 
                'estado' => 'ativo',
                'tipo' => 'usr', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'login' => 'user2',
                'senha' => 'user2345', 
                'estado' => 'inativo',
                'tipo' => 'usr', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'login' => 'user3',
                'senha' => 'user3456', 
                'estado' => 'ativo',
                'tipo' => 'usr', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'login' => 'user4',
                'senha' => 'user4567', 
                'estado' => 'med',
                'tipo' => 'usr', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
