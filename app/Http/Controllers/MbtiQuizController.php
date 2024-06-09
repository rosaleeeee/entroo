<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MbtiQuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private $questions = [
        "At a party, do you:" => [
            "Talk to many people, including those you don't know" => "E",
            "Stick to a few familiar faces" => "I"
        ],
        "Are you more:" => [
            "Practical than theoretical" => "S",
            "Theoretical than practical" => "N"
        ],
        "Is it worse to:" => [
            "Be out of touch with reality" => "S",
            "Be stuck in a mundane routine" => "N"
        ],
        "Are you more impressed by:" => [
            "Logic" => "T",
            "Feelings" => "F"
        ],
        "Are you more drawn to:" => [
            "Rational arguments" => "T",
            "Emotional appeals" => "F"
        ],
        "Do you prefer to work:" => [
            "With set deadlines" => "J",
            "At your own pace" => "P"
        ],
        "Do you make decisions:" => [
            "Carefully" => "J",
            "Spontaneously" => "P"
        ],
        "At gatherings, do you:" => [
            "Stay late, enjoying yourself more and more" => "E",
            "Leave early, feeling worn out" => "I"
        ],
        "Are you more attracted to:" => [
            "Practical people" => "S",
            "Imaginative people" => "N"
        ],
        "Are you more interested in:" => [
            "What is real" => "S",
            "What is possible" => "N"
        ],
        "When evaluating others, do you focus more on:" => [
            "Rules than exceptions" => "T",
            "Exceptions than rules" => "F"
        ],
        "When approaching others, do you tend to be:" => [
            "Objective" => "T",
            "Personal" => "F"
        ],
        "Are you more:" => [
            "Punctual" => "J",
            "Laid-back" => "P"
        ],
        "Does it bother you more to have things:" => [
            "Incomplete" => "J",
            "Finished" => "P"
        ],
        "In social settings, do you:" => [
            "Stay updated on others' lives" => "E",
            "Lose track of what’s going on with others" => "I"
        ],
        "When doing routine tasks, do you:" => [
            "Follow traditional methods" => "S",
            "Try new methods" => "N"
        ],
        "Writers should:" => [
            "Say exactly what they mean" => "S",
            "Use metaphors and analogies" => "N"
        ],
        "Which appeals to you more:" => [
            "Consistency in thought" => "T",
            "Harmonious relationships" => "F"
        ],
        "Are you more comfortable making:" => [
            "Logical decisions" => "T",
            "Value-based decisions" => "F"
        ],
        "Do you want things to be:" => [
            "Decided" => "J",
            "Open-ended" => "P"
        ],
        "Would you describe yourself as more:" => [
            "Serious and determined" => "J",
            "Relaxed and easy-going" => "P"
        ],
        "When making phone calls, do you:" => [
            "Not worry about saying everything correctly" => "E",
            "Rehearse what you’re going to say" => "I"
        ],
        "Facts:" => [
            "Speak for themselves" => "S",
            "Serve to illustrate principles" => "N"
        ],
        "Are visionaries:" => [
            "Annoying" => "S",
            "Intriguing" => "N"
        ],
        "Are you more often:" => [
            "Logical and cool-headed" => "T",
            "Warm and empathetic" => "F"
        ],
        "Is it worse to be:" => [
            "Unfair" => "T",
            "Unkind" => "F"
        ],
        "Should events unfold:" => [
            "By careful planning" => "J",
            "Naturally" => "P"
        ],
        "Do you feel better about:" => [
            "Making purchases" => "J",
            "Keeping your options open" => "P"
        ],
        "In social situations, do you:" => [
            "Start conversations" => "E",
            "Wait for others to initiate" => "I"
        ],
        "Common sense is:" => [
            "Seldom questioned" => "S",
            "Often questioned" => "N"
        ],
        "Children should:" => [
            "Be more useful" => "S",
            "Use their imagination more" => "N"
        ],
        "When making decisions, do you rely more on:" => [
            "Standards" => "T",
            "Emotions" => "F"
        ],
        "Are you more:" => [
            "Firm than gentle" => "T",
            "Gentle than firm" => "F"
        ],
        "Which is more admirable:" => [
            "Being organized and methodical" => "J",
            "Being adaptable and resourceful" => "P"
        ],
        "Do you value being:" => [
            "Consistent" => "J",
            "Open to new experiences" => "P"
        ],
        "Does meeting new people:" => [
            "Energize you" => "E",
            "Exhaust you" => "I"
        ],
        "Are you more frequently:" => [
            "Practical" => "S",
            "Imaginative" => "N"
        ],
        "Are you more likely to:" => [
            "See how others can be useful" => "S",
            "Understand others' perspectives" => "N"
        ],
        "Which is more satisfying:" => [
            "Thoroughly discussing an issue" => "T",
            "Reaching a consensus" => "F"
        ],
        "Which governs you more:" => [
            "Your mind" => "T",
            "Your heart" => "F"
        ],
        "Are you more comfortable with work that is:" => [
            "Structured" => "J",
            "Flexible" => "P"
        ],
        "Do you look for:" => [
            "Order" => "J",
            "Spontaneity" => "P"
        ],
        "Do you prefer:" => [
            "Many acquaintances" => "E",
            "A few close friends" => "I"
        ],
        "Do you rely more on:" => [
            "Facts" => "S",
            "Theories" => "N"
        ],
        "Are you more interested in:" => [
            "Production and efficiency" => "S",
            "Design and innovation" => "N"
        ],
        "Which is a greater compliment:" => [
            "To be called logical" => "T",
            "To be called compassionate" => "F"
        ],
        "Do you value more in yourself that you are:" => [
            "Decisive" => "J",
            "Devoted" => "P"
        ],
        "Do you prefer:" => [
            "Definite statements" => "J",
            "Tentative statements" => "P"
        ],
        "Are you more comfortable:" => [
            "After making a decision" => "J",
            "Before making a decision" => "P"
        ],
        "Do you:" => [
            "Easily talk with strangers" => "E",
            "Find it hard to talk with strangers" => "I"
        ],
        "Do you trust your:" => [
            "Experience" => "S",
            "Intuition" => "N"
        ],
        "Do you feel:" => [
            "More practical than creative" => "S",
            "More creative than practical" => "N"
        ],
        "Which person is more admirable:" => [
            "One with clear reasoning" => "T",
            "One with strong emotions" => "F"
        ],
        "Are you more inclined to be:" => [
            "Fair-minded" => "T",
            "Sympathetic" => "F"
        ],
        "Is it preferable to:" => [
            "Ensure things are arranged" => "J",
            "Let things happen naturally" => "P"
        ],
        "In relationships, should most things be:" => [
            "Negotiable" => "J",
            "Circumstantial" => "P"
        ],
        "When the phone rings, do you:" => [
            "Rush to answer" => "E",
            "Hope someone else answers" => "I"
        ],
        "Do you prize more in yourself:" => [
            "A strong sense of reality" => "S",
            "A vivid imagination" => "N"
        ],
        // Ajoutez les autres questions ici
    ];

    private function formatQuestionKey($question) {
        // Remplace les points, espaces et points d'interrogation par des underscores
        return strtolower(preg_replace('/[. ?]+/', '_', $question));
    }

    public function show() {
        // Assumons que vous passez les questions à la vue show.blade.php
        return view('level4.quiz.show', [
            'questions' => $this->questions,
            'formatQuestionKey' => function ($question) {
                return $this->formatQuestionKey($question);
            }
        ]);
    }


    public function submit(Request $request)
    {
        $data = $request->all();
        $results = [
            'E' => 0,
            'I' => 0,
            'S' => 0,
            'N' => 0,
            'T' => 0,
            'F' => 0,
            'J' => 0,
            'P' => 0,
        ];

        // Traiter chaque question
        foreach ($this->questions as $question => $answers) {
            $key = $this->formatQuestionKey($question); // Utilisation de la fonction formatQuestionKey
            if (isset($data[$key])) {
                $results[$data[$key]]++;
            } else {
                // Gérer les réponses manquantes
                return redirect()->back()->withErrors(['message' => 'Veuillez répondre à toutes les questions.']);
            }
        }

        $mbti_type = '';
        $mbti_type .= $results['E'] >= $results['I'] ? 'E' : 'I';
        $mbti_type .= $results['S'] >= $results['N'] ? 'S' : 'N';
        $mbti_type .= $results['T'] >= $results['F'] ? 'T' : 'F';
        $mbti_type .= $results['J'] >= $results['P'] ? 'J' : 'P';

        $user = Auth::user();
        $user->mbti_type = $mbti_type;
        $user->save();

        return redirect()->route('quiz.result');
    }

    public function result()
    {
        $user = Auth::user();
        return view('level4.quiz.result', ['mbti_type' => $user->mbti_type]);
    }
}
