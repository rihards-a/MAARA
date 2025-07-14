<?php

namespace Database\Seeders\QuestionnaireQuestions;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PienakumiSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Create (or upsert) the questionnaire
        DB::table('questionnaires')
            ->updateOrInsert(
                ['title' => 'pienakumi'],
                [
                    'description' => 'Dzīves laikā mēs mēdzam uzņemties rūpes un saistības pret citiem cilvēkiem, būtnēm un lietām uz šīs zemes.',
                    'updated_at'  => now(),
                    'created_at'  => now(),
                ]
            );

        // Fetch the ID (in case it existed already)
        $questionnaire = DB::table('questionnaires')
            ->where('title', 'pienakumi')
            ->first();

        // 2) Insert all questions with fixed IDs
        $questions = [
            [
                'id'               => 17,
                'text'             => 'Paziņojums par aiziešanu',
                'type'             => 'textarea',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 18,
                'text'             => 'Mājdzīvnieki',
                'type'             => 'textarea',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 19,
                'text'             => 'Īpaši cilvēki',
                'type'             => 'textarea',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 20,
                'text'             => 'Augi',
                'type'             => 'textarea',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 21,
                'text'             => 'Citi sadzīves pienākumi',
                'type'             => 'textarea',
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
