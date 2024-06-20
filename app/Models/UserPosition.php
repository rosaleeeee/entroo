<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'position',
    ];

    // Définir les relations éventuelles ici, par exemple :
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
