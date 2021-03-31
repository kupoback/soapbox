<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    
    protected $table = 'user_role';
    
    protected $hidden = [
        'user_role',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
