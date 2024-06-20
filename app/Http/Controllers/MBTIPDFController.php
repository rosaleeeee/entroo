<?php

// app/Http/Controllers/MBTIPDFController.php
namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\PDF;

class MBTIPDFController extends Controller
{
    public function generatePDF($user_id)
    {
        // Récupérer l'utilisateur par son ID
        $user = User::findOrFail($user_id);

        // Définir les vues pour chaque type MBTI
        $views = [
            'INTJ' => 'level4.quiz.mbti_pdf.INTJ',
            'ENTP' => 'level4.quiz.mbti_pdf.ENTP',
            'ENFP' => 'level4.quiz.mbti_pdf.ENFP',
            'INFJ' => 'level4.quiz.mbti_pdf.INFJ',
            'INTP' => 'level4.quiz.mbti_pdf.INTP',
            'INFP' => 'level4.quiz.mbti_pdf.INFP',
            'ISTJ' => 'level4.quiz.mbti_pdf.ISTJ',
            'ISFJ' => 'level4.quiz.mbti_pdf.ISFJ',
            'ISTP' => 'level4.quiz.mbti_pdf.ISTP',
            'ISFP' => 'level4.quiz.mbti_pdf.ISFP',
            'ENTJ' => 'level4.quiz.mbti_pdf.ENTJ',
            'ENFJ' => 'level4.quiz.mbti_pdf.ENFJ',
            'ESTJ' => 'level4.quiz.mbti_pdf.ESTJ',
            'ESFJ' => 'level4.quiz.mbti_pdf.ESFJ',
            'ESTP' => 'level4.quiz.mbti_pdf.ESTP',
            'ESFP' => 'level4.quiz.mbti_pdf.ESFP',
        ];

            $view = $views[$user->mbti_type];

            // Charger la vue et passer les données
            $pdf = PDF::loadView($view, compact('user'));

            // Télécharger le PDF
            return $pdf->download('mbti_profile.pdf');
    }
}
