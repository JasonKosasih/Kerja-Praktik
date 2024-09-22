<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ip_address', 'user_agent', 'logged_in_at'];

    // Define relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

