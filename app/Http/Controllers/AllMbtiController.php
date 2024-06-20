<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AllMbtiController extends Controller
{
    public function index()
    {
        // Récupérer les noms et MBTI de 9 utilisateurs qui ont un type MBTI défini
        $users = User::select('name', 'mbti_type')
            ->whereNotNull('mbti_type')
            ->limit(9)
            ->get();

        // Passer les données à la vue
        return view('level4.quiz.all_mbti', compact('users'));
    }
}
