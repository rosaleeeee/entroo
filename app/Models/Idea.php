<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    protected $fillable = ['user_id', 'title', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function userHasSubmittedIdea($userId)
    {
        return self::where('user_id', $userId)->exists();
    }
}
