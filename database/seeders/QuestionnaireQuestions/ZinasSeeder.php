<?php

namespace Database\Seeders\QuestionnaireQuestions;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ZinasSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Create (or upsert) the questionnaire
        DB::table('questionnaires')
            ->updateOrInsert(
                ['title' => 'zinas'],
                [
                    'description' => 'Šajā sadaļā aicinām Tevi atstāt ziņas saviem tuvajiem — vārdus, kas viņus sasniegs pēc Tavas aiziešanas.',
                    'updated_at'  => now(),
                    'created_at'  => now(),
                ]
            );
    }
}
