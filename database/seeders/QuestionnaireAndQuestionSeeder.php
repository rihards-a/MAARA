<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Questionnaire;
use App\Models\Question;

class QuestionnaireAndQuestionSeeder extends Seeder
{
    public function run(): void
    {
        // Create a questionnaire
        $questionnaire = Questionnaire::create([
            'title'       => 'Customer Satisfaction Survey',
            'description' => 'A survey to measure customer satisfaction.',
        ]);

        // Create questions for the questionnaire
        $questionnaire->questions()->createMany([
            [
                'text' => 'How satisfied are you with our service?',
                'type' => 'rating', // could be rating, multiple-choice, etc.
            ],
            [
                'text' => 'Would you recommend our service to others?',
                'type' => 'boolean', // yes/no question
            ],
            [
                'text' => 'What could we improve?',
                'type' => 'text', // open ended text response
            ],
        ]);

        // Optionally, add another questionnaire with questions
        $anotherQuestionnaire = Questionnaire::create([
            'title'       => 'Employee Feedback Survey',
            'description' => 'Gathering feedback from employees about the workplace.',
        ]);

        $anotherQuestionnaire->questions()->createMany([
            [
                'text' => 'How do you rate the work environment?',
                'type' => 'rating',
            ],
            [
                'text' => 'Do you feel valued at work?',
                'type' => 'boolean',
            ],
            [
                'text' => 'Any suggestions for improvement?',
                'type' => 'text',
            ],
        ]);
    }


}
