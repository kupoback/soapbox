<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersViewedTopic extends Model
{
    use HasFactory;
    
    protected $table = 'users_viewed_topic';
    
    protected $fillable = [
        'user_id',
        'topic_id',
    ];
    
}
