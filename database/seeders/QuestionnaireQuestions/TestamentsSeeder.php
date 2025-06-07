<?php

namespace Database\Seeders\QuestionnaireQuestions;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TestamentsSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Create (or upsert) the questionnaire
        DB::table('questionnaires')
            ->updateOrInsert(
                ['title' => 'testaments'],
                [
                    'description' => 'Ja vēlies mantu dalīt citādās proporcijās, novēlēt draugam vai labdarības organizācijai, testaments ir nepieciešams.',
                    'updated_at'  => now(),
                    'created_at'  => now(),
                ]
            );

        // Fetch the ID (in case it existed already)
        $questionnaire = DB::table('questionnaires')
            ->where('title', 'testaments')
            ->first();

        // 2) Insert all questions with fixed IDs
        $questions = [
            [
                'id'               => 200,
                'text'             => 'Es esmu izveidojis savu publisko testamentu pie notāra.',
                'type'             => 'boolean',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 201,
                'text'             => 'Es esmu izveidojis savu privāto testamentu, kas nodots glabāšanā pie notāra.',
                'type'             => 'boolean',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 202,
                'text'             => 'Es esmu izveidojis savu privāto testamentu, ko esmu noglabājis citur.',
                'type'             => 'boolean',
                'questionnaire_id' => $questionnaire->id,
                'updated_at'  => now(),
                'created_at'  => now(),
            ],
            [
                'id'               => 203,
                'text'             => 'Es vēlos, lai mana manta tiek sadalīta civillikumā noteiktajā kārtībā.',
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
