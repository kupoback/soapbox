<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersViewedComments extends Model
{
    use HasFactory;
    
    protected $table = 'users_viewed_comment';
}
