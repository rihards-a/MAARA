<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\QuestionnaireQuestions\QuestionnaireAndQuestionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BlogSeeder::class,
            QuestionnaireAndQuestionSeeder::class,
        ]);
    }
}
