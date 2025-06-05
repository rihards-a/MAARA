<?php

namespace Database\Seeders\QuestionnaireQuestions;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FinansesSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Create (or upsert) the questionnaire
        DB::table('questionnaires')
            ->updateOrInsert(
                ['title' => 'finanses'],
                [
                    'description' => 'Aizpildi šo sadaļu, lai ērti uzskaitītu finanšu instrumentus, par kuriem Taviem tuviniekiem būtu jāzina.',
                    'updated_at'  => now(),
                    'created_at'  => now(),
                ]
            );

        // Fetch the ID (in case it existed already)
        $questionnaire = DB::table('questionnaires')
            ->where('title', 'finanses')
            ->first();

        // 2) Insert all questions with fixed IDs
        $questions = [
            [
                'id'               => 100,
                'text'             => 'Vai Tu glabā naudu kādā no šiem finanšu rīkiem?',
                'type'             => 'multichoice',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 101,
                'text'             => 'Kurās bankās Tev ir atvērti konti?',
                'type'             => 'multichoice',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 102,
                'text'             => 'Vai Tev pieder kāda uzņēmuma akcijas?',
                'type'             => 'multichoice',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 103,
                'text'             => 'Vai Tev pieder kriptovalūtas?',
                'type'             => 'multichoice',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 104,
                'text'             => 'Vai Tev pieder kāds nekustamais īpašums?',
                'type'             => 'multichoice',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 105,
                'text'             => 'Vai Tev pieder kāds transportlīdzeklis?',
                'type'             => 'multichoice',
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
