<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RecController extends Controller
{
    public function index()
    {
        // Récupérer 9 utilisateurs avec les champs name, mbti_type et job
        $users = User::whereNotNull('job')
        ->whereNotNull('mbti_type')
        ->select('name', 'mbti_type', 'job')
        ->take(9)
        ->get();
        // Passer les données à la vue
        return view('level4.quiz.affichage_poste', compact('users'));
    }
}
