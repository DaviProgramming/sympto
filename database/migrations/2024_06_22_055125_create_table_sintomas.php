<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sintomas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });

        DB::table('sintomas')->insert([
            ['name' => 'Febre'],
            ['name' => 'Dor de cabeça'],
            ['name' => 'Náusea'],
            ['name' => 'Fadiga'],
            ['name' => 'Dor abdominal'],
            ['name' => 'Tosse'],
            ['name' => 'Dor de garganta'],
            ['name' => 'Congestão nasal'],
            ['name' => 'Diarreia'],
            ['name' => 'Erupção cutânea'],
            ['name' => 'Calafrios'],
            ['name' => 'Falta de ar'],
            ['name' => 'Tontura'],
            ['name' => 'Perda de apetite'],
            ['name' => 'Dores musculares'],
            ['name' => 'Inchaço'],
            ['name' => 'Palpitações'],
            ['name' => 'Suores noturnos'],
            ['name' => 'Visão embaçada'],
            ['name' => 'Coceira'],
            ['name' => 'Dor no peito'],
            ['name' => 'Perda de olfato'],
            ['name' => 'Perda de paladar'],
            ['name' => 'Dificuldade para engolir'],
            ['name' => 'Inchaço nas articulações'],
            ['name' => 'Rouquidão'],
            ['name' => 'Desmaio'],
            ['name' => 'Dor nas costas'],
            ['name' => 'Dor ao urinar'],
            ['name' => 'Sangramento nasal'],
            ['name' => 'Dor de dente'],
            ['name' => 'Perda de peso inexplicada'],
            ['name' => 'Pele amarelada'],
            ['name' => 'Olhos vermelhos'],
            ['name' => 'Vômito'],
            ['name' => 'Aftas'],
            ['name' => 'Urticária'],
            ['name' => 'Dores articulares'],
            ['name' => 'Zumbido no ouvido'],
            ['name' => 'Tremores'],
            ['name' => 'Confusão mental'],
            ['name' => 'Dificuldade para respirar'],
            ['name' => 'Inchaço nas pernas'],
            ['name' => 'Fraqueza muscular'],
            ['name' => 'Batimento cardíaco irregular'],
            ['name' => 'Alterações de humor'],
            ['name' => 'Hematomas fáceis'],
            ['name' => 'Dor nos olhos'],
            ['name' => 'Sensibilidade à luz'],
            ['name' => 'Dificuldade para dormir'],
            ['name' => 'Sensação de formigamento'],
            ['name' => 'Cãibras'],
            ['name' => 'Rigidez matinal'],
            ['name' => 'Pele seca'],
            ['name' => 'Excesso de suor'],
            ['name' => 'Dificuldade para se concentrar'],
            ['name' => 'Olhos secos'],
            ['name' => 'Manchas na pele'],
            ['name' => 'Problemas de equilíbrio'],
            ['name' => 'Dificuldade de fala'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sintomas');
    }
};
