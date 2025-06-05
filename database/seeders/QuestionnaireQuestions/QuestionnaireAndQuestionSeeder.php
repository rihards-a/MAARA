<?php

namespace Database\Seeders\QuestionnaireQuestions;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class QuestionnaireAndQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BeresSeeder::class,
            FinansesSeeder::class,
            MedSeeder::class,
            PensijaSeeder::class,
            PienakumiSeeder::class,
            TestamentsSeeder::class,
        ]);
    }
}
