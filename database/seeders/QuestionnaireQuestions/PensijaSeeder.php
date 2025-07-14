<?php

namespace Database\Seeders\QuestionnaireQuestions;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PensijaSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Create (or upsert) the questionnaire
        DB::table('questionnaires')
            ->updateOrInsert(
                ['title' => 'pensija'],
                [
                    'description' => 'Pensijas 2. līmeņa uzkrājuma mantošana.',
                    'updated_at'  => now(),
                    'created_at'  => now(),
                ]
            );

        // Fetch the ID (in case it existed already)
        $questionnaire = DB::table('questionnaires')
            ->where('title', 'pensija')
            ->first();

        // 2) Insert all questions with fixed IDs
        $questions = [
            [
                'id'               => 16,
                'text'             => 'Mana izvēle par pensijas 2. līmeņa uzkrājuma mantošanu ir veikta',
                'type'             => 'boolean',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
        ];

        // Use upsert to avoid duplicates on repeated runs
        DB::table('questions')->upsert(
            $questions,
            ['id'],          // unique by `id`
            ['text', 'type', 'questionnaire_id', 'updated_at']
        );
    }
}
