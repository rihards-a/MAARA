<?php

namespace Database\Seeders\QuestionnaireQuestions;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MedSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Create (or upsert) the questionnaire
        DB::table('questionnaires')
            ->updateOrInsert(
                ['title' => 'med'],
                [
                    'description' => 'Orgānu ziedošana un ķermeņa izmantošana zinātnes attīstībā.',
                    'updated_at'  => now(),
                    'created_at'  => now(),
                ]
            );

        // Fetch the ID (in case it existed already)
        $questionnaire = DB::table('questionnaires')
            ->where('title', 'med')
            ->first();

        // 2) Insert all 12 questions with fixed IDs
        $questions = [
            [
                'id'               => 13,
                'text'             => 'Mana izvēle par orgānu ziedošanu ir veikta',
                'type'             => 'boolean',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 14,
                'text'             => 'Mana izvēle par ķermeņa izmantošanu zinātnei ir veikta',
                'type'             => 'boolean',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 15,
                'text'             => 'Mana pilnvara par ar ārstniecību saistītiem lēmumiem ir sagatavota',
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
