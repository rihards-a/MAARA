<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Response extends Model
{
    use HasFactory;

    protected $table = 'user_question'; // Specify the table name since it doesn't follow the plural naming convention.

    protected $fillable = [
        'user_id',
        'question_id',
        'response_value',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
        'response_value' => 'encrypted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
