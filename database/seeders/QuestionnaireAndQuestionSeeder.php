<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Questionnaire;
use App\Models\Question;

class QuestionnaireAndQuestionSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Create (or upsert) the questionnaire
        DB::table('questionnaires')
            ->updateOrInsert(
                ['title' => 'beres'],
                [
                    'description' => 'Bēru organizēšana mēdz kļūt par galveno praktisko diskusiju objektu palicēju starpā.',
                    'updated_at'  => now(),
                    'created_at'  => now(),
                ]
            );

        // Fetch the ID (in case it existed already)
        $questionnaire = DB::table('questionnaires')
            ->where('title', 'beres')
            ->first();

        // 2) Insert all 12 questions with fixed IDs
        $questions = [
            [
                'id'               => 1,
                'text'             => 'Apraksti sev svarīgākās bēru detaļas:',
                'type'             => 'textarea',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 2,
                'text'             => 'Ko Tu noteikti negribētu savās bērēs?',
                'type'             => 'textarea',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 3,
                'text'             => 'Apglabāšanas preference:',
                'type'             => 'select',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 4,
                'text'             => 'Norādes par atdusas vietu:',
                'type'             => 'textarea',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 5,
                'text'             => 'Bēru runa:',
                'type'             => 'textarea',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 6,
                'text'             => 'Mūzikas izvēle:',
                'type'             => 'textarea',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 7,
                'text'             => 'Atvadīšanās lokācija:',
                'type'             => 'textarea',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 8,
                'text'             => 'Kopējā noskaņa:',
                'type'             => 'textarea',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 9,
                'text'             => 'Uzaicinātie viesi:',
                'type'             => 'textarea',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 10,
                'text'             => 'Rituālie priekšmeti (zārks, urna, piemineklis, u.c.):',
                'type'             => 'textarea',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 11,
                'text'             => 'Ziedu izvēle:',
                'type'             => 'textarea',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 12,
                'text'             => 'Organizatori vai padomdevēji:',
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
