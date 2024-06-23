<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Vote;
use App\Models\User;
use Auth;

class IdeaController extends Controller
{
    public function index()
{
    // Récupérer toutes les idées avec le nombre de votes
    $ideas = Idea::withCount('votes')->get();

    // Compter le nombre d'utilisateurs ayant voté au moins une fois
    $usersWithVotes = User::whereHas('votes')->count();
    $atLeastNineUsersVoted = $usersWithVotes >= 9;

    return view('level2.lev2_1', compact('ideas', 'atLeastNineUsersVoted'));
}

    public function showForm()
    {
        if (Idea::userHasSubmittedIdea(Auth::id())) {
            return redirect('/ideas')->with('error', 'You have already submitted an idea.');
        }

        return view('level2.lev2');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        if (Idea::userHasSubmittedIdea(Auth::id())) {
            return redirect('/ideas')->with('error', 'You have already submitted an idea.');
        }

        $idea = new Idea();
        $idea->user_id = Auth::id();
        $idea->title = $request->title;
        $idea->description = $request->description;
        $idea->votes = 0; // Cette ligne peut être supprimée si vous n'avez pas de champ votes dans votre table ideas
        $idea->save();

        return redirect('/ideas');
    }

    public function vote($id)
    {
        $userId = Auth::id();

        if (Vote::where('user_id', $userId)->count() >= 3) {
            return redirect('/ideas')->with('error', 'You have reached the maximum number of votes.');
        }

        $vote = new Vote();
        $vote->user_id = $userId;
        $vote->idea_id = $id;
        $vote->save();

        return redirect('/ideas');
    }

    public function winningIdea()
    {
        $winningIdea = Idea::withCount('votes')->orderBy('votes_count', 'desc')->first();
        return view('level2.lev2_2', compact('winningIdea'));
    }
}
