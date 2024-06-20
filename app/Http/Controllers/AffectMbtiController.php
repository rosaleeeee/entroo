<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPosition;

class AffectMbtiController extends Controller
{
    // Méthode pour afficher la vue
    public function index()
    {
        // Récupérer tous les utilisateurs de la base de données
        $users = User::take(9)->get();
        
        // Les postes à affecter
        $positions = [
            'Product Manager',
            'Marketing Manager',
            'Sales Manager',
            'Customer Service Manager',
            'Chief Financial Officer (CFO)',
            'Chief Operating Officer (COO)',
            'Project Manager',
            'Partnerships Manager',
            'Accountant' 
        ];

        return view('level4.quiz.affect_mbti', compact('users', 'positions'));
    }
    
    // Mettre à jour les jobs des utilisateurs directement
    public function updateJobs(Request $request)
    {
        $positions = $request->input('positions', []);

        foreach ($positions as $position) {
            $user = User::find($position['userId']);
            if ($user) {
                $user->job = $position['job'];
                $user->save();
            }
        }

        return response()->json(['message' => 'Jobs mis à jour avec succès']);
    }

    // Mettre à jour les affectations temporaires dans la table user_position
    public function updateTemporaryJobs(Request $request)
    {
        $positions = $request->input('positions', []);

        foreach ($positions as $position) {
            // Utilisation de create pour ajouter une nouvelle ligne à user_position
            UserPosition::create([
                'user_id' => $position['userId'],
                'position' => $position['job']
            ]);
        }

        return response()->json(['message' => 'Affectations temporaires mises à jour']);
    }

    // Finaliser les jobs en fonction des affectations temporaires
    public function finalizeJobs()
{
    // Récupérer toutes les affectations temporaires
    $userPositions = UserPosition::all();

    // Tableau pour compter les occurrences de chaque poste par utilisateur
    $positionCounts = [];

    // Compter les occurrences de chaque poste par utilisateur
    foreach ($userPositions as $userPosition) {
        $userId = $userPosition->user_id;
        $position = $userPosition->position;

        if (!isset($positionCounts[$userId])) {
            $positionCounts[$userId] = [];
        }

        if (!isset($positionCounts[$userId][$position])) {
            $positionCounts[$userId][$position] = 0;
        }

        $positionCounts[$userId][$position]++;
    }

    // Tableau pour stocker les postes déjà assignés
    $assignedPositions = [];
    
    // Tableau pour stocker les utilisateurs déjà assignés
    $assignedUsers = [];

    // Assigner les postes aux utilisateurs
    while (count($assignedUsers) < count($positionCounts)) {
        foreach ($positionCounts as $userId => $positions) {
            // Trier les postes par occurrences décroissantes
            arsort($positions);

            // Trouver le premier poste non assigné pour cet utilisateur
            foreach ($positions as $position => $count) {
                if (!in_array($position, $assignedPositions)) {
                    $user = User::find($userId);
                    if ($user) {
                        $user->job = $position;
                        $user->save();

                        // Ajouter l'utilisateur et le poste aux tableaux des assignations
                        $assignedUsers[] = $userId;
                        $assignedPositions[] = $position;
                    }
                    break;
                }
            }
        }
    }

    // Supprimer toutes les affectations temporaires après finalisation
    UserPosition::truncate();

    return response()->json(['message' => 'Les emplois ont été finalisés avec succès']);
}


    // Vérifier si tous les utilisateurs ont complété leurs affectations
    public function checkAllUsersCompleted()
    {
        $positionCount = UserPosition::count();

        return response()->json([
            'allCompleted' =>  $positionCount >= 81 
        ]);
    }

}
