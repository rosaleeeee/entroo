<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'key_partnerships',
        'key_activities',
        'key_resources',
        'value_propositions',
        'customer_relationships',
        'customer_segments',
        'channels',
        'cost_structure',
        'revenue_streams',
        'completed'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
