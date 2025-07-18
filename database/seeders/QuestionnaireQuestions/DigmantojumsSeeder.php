<?php

namespace Database\Seeders\QuestionnaireQuestions;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DigmantojumsSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Create (or upsert) the questionnaire
        DB::table('questionnaires')
            ->updateOrInsert(
                ['title' => 'digmantojums'],
                [
                    'description' => 'Mūsdienās cilvēks aiz sevis atstāj ne tikai taustāmas lietas, bet arī jūkli ar informāciju digitālajā vidē.',
                    'updated_at'  => now(),
                    'created_at'  => now(),
                ]
            );
    }
}
