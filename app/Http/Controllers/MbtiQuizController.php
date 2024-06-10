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
        // Ajoutez les autres questions ici
    ];

    public function show()
    {
        return view('level4.quiz.show', ['questions' => $this->questions]);
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
            $key = str_replace(' ', '_', strtolower($question));
            if (isset($data[$key])) {
                $results[$data[$key]]++;
            } else {
                // Gérer les réponses manquantes
                return redirect()->back()->withErrors(['message' => 'Veuillez répondre à toutes les questions.']);
            }
        }

        // Calculer le type MBTI
        $mbti_type = '';
        $mbti_type .= $results['E'] >= $results['I'] ? 'E' : 'I';
        $mbti_type .= $results['S'] >= $results['N'] ? 'S' : 'N';
        $mbti_type .= $results['T'] >= $results['F'] ? 'T' : 'F';
        $mbti_type .= $results['J'] >= $results['P'] ? 'J' : 'P';

        // Mettre à jour le type MBTI de l'utilisateur
        $user = Auth::user();
        $user->mbti_type = $mbti_type;
        $user->save();

        // Rediriger vers la vue de résultat avec tous les résultats
        return redirect()->route('quiz.result', compact('mbti_type', 'results'));
    }

    public function result(Request $request)
    {
        $user = Auth::user();

        // Récupérer le type MBTI et les résultats de la requête
        $mbti_type = $request->input('mbti_type');
        $results = $request->input('results');

        // Extraire chaque résultat individuellement
        $results_E = $results['E'];
        $results_I = $results['I'];
        $results_S = $results['S'];
        $results_N = $results['N'];
        $results_T = $results['T'];
        $results_F = $results['F'];
        $results_J = $results['J'];
        $results_P = $results['P'];

        return view('level4.quiz.result', compact('user', 'mbti_type', 'results_E', 'results_I', 'results_S', 'results_N', 'results_T', 'results_F', 'results_J', 'results_P'));
    }
}
