<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionableItems extends Model
{
    use HasFactory;
    
    protected $table = 'actionable_items';
    
    protected $fillable = [
        'title',
        'status_id',
        'list_order',
    ];
    
    protected $hidden = [
        'created_by',
    ];
    
}
