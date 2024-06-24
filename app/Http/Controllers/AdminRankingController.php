<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminRankingController extends Controller
{
    public function index()
    {
        // Récupérer tous les utilisateurs avec leur nom, email, email_verified_at et created_at
        $users = User::select('name', 'email', 'email_verified_at', 'created_at')->get();

        return view('admin-ranking', compact('users'));
    }
}
