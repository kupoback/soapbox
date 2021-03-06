<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersViewedComment extends Model
{
    use HasFactory;
    
    protected $table = 'users_viewed_comment';
    
    protected $hidden = [
        'user_id',
        'comment_id',
    ];
    
}
