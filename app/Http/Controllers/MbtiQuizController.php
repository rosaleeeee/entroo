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

        return redirect()->route('quiz.result')->with([
            'E' => $results['E'],
            'I' => $results['I'],
            'S' => $results['S'],
            'N' => $results['N'],
            'T' => $results['T'],
            'F' => $results['F'],
            'J' => $results['J'],
            'P' => $results['P']
        ]);

    }

    public function result()
    {
        $user = Auth::user();
        $sessionData = [
            'E' => session('E'),
            'I' => session('I'),
            'S' => session('S'),
            'N' => session('N'),
            'T' => session('T'),
            'F' => session('F'),
            'J' => session('J'),
            'P' => session('P'),
            'mbti_type' => $user->mbti_type
        ];
   ; // Debugging line
    
        return view('level4.quiz.result', $sessionData);
    }
    
}
