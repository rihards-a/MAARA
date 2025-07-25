<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'importance',
        'access_method',
        'action_after_death',
        'comments',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}