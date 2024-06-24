<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RankingController extends Controller
{
    public function index()
    {
        // Récupérer tous les utilisateurs avec leur nom, MBTI, job et score
        $users = User::select('name', 'mbti_type', 'job', 'score')->get();

        return view('ranking', compact('users'));
    }
}
