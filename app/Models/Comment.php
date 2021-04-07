<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $table = 'comments';
    
    protected $fillable = [
        'comments',
    ];
    
    protected $hidden = [
        'topic_id',
    ];
    
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
    
}
