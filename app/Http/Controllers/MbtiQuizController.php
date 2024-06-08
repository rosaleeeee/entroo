<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MbtiQuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    private $questions = [
        "1. At a party do you:" => [
            "a. Interact with many, including strangers" => "E",
            "b. Interact with a few, known to you" => "I"
        ],
        "2. Are you more:" => [
            "a. Realistic than speculative" => "S",
            "b. Speculative than realistic" => "N"
        ],
        "3. Is it worse to:" => [
            "a. Have your “head in the clouds”" => "S",
            "b. Be “in a rut”" => "N"
        ],
        "4. Are you more impressed by:" => [
            "a. Principles" => "T",
            "b. Emotions" => "F"
        ],
        "5. Are more drawn toward the:" => [
            "a. Convincing" => "T",
            "b. Touching" => "F"
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

        foreach ($data as $key => $answer) {
            $results[$answer]++;
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
        return view('quiz.result', ['mbti_type' => $user->mbti_type]);
    }
}
