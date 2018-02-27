<?php

use App\Models\Morale\MoraleSurveyQuestions;
use Illuminate\Database\Seeder;

class MoraleSurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [ 'text_question' => 'Do you clearly understand your organization\'s policies and goals?' ],
            [ 'text_question' => 'Has your superior ably translated your organization\'s objectives into meaningful assignments and goals for you?' ],
            [ 'text_question' => 'Do you find your job interesting and challenging?' ],
            [ 'text_question' => 'Do you get any satisfaction from your work?' ],
            [ 'text_question' => 'Do you think you are getting a fair remuneration package (salary, bonus, allowances, and other benefits) for your job?' ],
            [ 'text_question' => 'Are you sufficiently recognized by your superior for performing a good job?' ],
            [ 'text_question' => 'Are you given adequate training and coaching to help you develop your potential?' ],
            [ 'text_question' => 'Does your superior take time to discuss with you your performance, growth and development?' ],
            [ 'text_question' => 'Do you think the amount of trust, cooperation, understanding and warmth that exists both among staff and between staff and management is high?' ],
            [ 'text_question' => 'Do you think teamwork in your department is good?' ],
            [ 'text_question' => 'Do you think there are good career opportunities and good chance for advancement in your organization?' ],
            [ 'text_question' => 'Do you think you do not need to play politics to get ahead in your organization?' ],
            [ 'text_question' => 'Do you think the management implements your organization\'s policies fairly?' ],
            [ 'text_question' => 'Can you trust the management and believe in what they say?' ],
            [ 'text_question' => 'Is communication in your organization effective, both among staff and between management and staff?' ],
            [ 'text_question' => 'Do you think the feelings, ideas and suggestions of staff are communicated to the management?' ],
            [ 'text_question' => 'Are you willing to put in efforts beyond that normally expected in order to help your organization be successful?' ],
            [ 'text_question' => 'Do you want to continue to work for your organization in the next 5 years?' ],
        ];

        foreach ($questions as $question) {
            MoraleSurveyQuestions::create($question);
        }
    }
}
