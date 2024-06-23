<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User; // Assurez-vous d'importer le modèle User
use Illuminate\Support\Facades\Auth; // Assurez-vous d'importer la façade Auth

class GameController extends Controller
{
    public function checkAnswers(Request $request)
    {
        Log::info('checkAnswers called with data:', $request->all());

        try {
            $correctAnswers = [
                "cell1" => "Key Partners",
                "cell2" => "Key Activities",
                "cell3" => "Key Resources",
                "cell4" => "Value Propositions",
                "cell5" => "Customer Relationships",
                "cell6" => "Channels",
                "cell7" => "Customer Segments",
                "cell8" => "Cost Structure",
                "cell9" => "Revenue Streams"
            ];

            $attempts = $request->input('attempts');
            $userAnswers = $request->input('answers');
            $allCorrect = true;
            $score = 0;

            foreach ($correctAnswers as $cell => $correctAnswer) {
                if ($userAnswers[$cell] !== $correctAnswer) {
                    $allCorrect = false;
                    break;
                }
            }

            Log::info('Validation results:', [
                'allCorrect' => $allCorrect,
                'userAnswers' => $userAnswers
            ]);

            if ($allCorrect) {
                switch ($attempts) {
                    case 1:
                        $score = 5;
                        $message = "Congratulations! All answers are correct on the first try. You scored 5 points.";
                        break;
                    case 2:
                        $score = 3;
                        $message = "Well done! All answers are correct on the second try. You scored 3 points.";
                        break;
                    case 3:
                        $score = 1;
                        $message = "Good job! All answers are correct on the third try. You scored 1 point.";
                        break;
                    default:
                        $score = 0;
                        $message = "Sorry, you didn't get all answers correct within three tries.";
                        break;
                }

                // Mettre à jour le score de l'utilisateur dans la base de données
                $user = Auth::user();
                $user->score += $score; // Ajouter le score au score existant
                $user->save();
            } else {
                $message = "Sorry, you didn't get all answers correct. The correct answers will now be displayed.";
            }

            return response()->json([
                'success' => true,
                'allCorrect' => $allCorrect,
                'message' => $message,
                'score' => $score,
                'attempts' => $attempts + 1
            ]);
        } catch (\Exception $e) {
            Log::error('Error in checkAnswers:', ['error' => $e->getMessage()]);

            return response()->json(['error' => 'An error occurred. Please try again.'], 500);
        }
    }
}
