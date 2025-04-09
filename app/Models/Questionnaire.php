<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Questionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_questionnaire')
                    ->withTimestamps()
                    ->withPivot('started_at', 'completed_at', 'status');
    }
}
