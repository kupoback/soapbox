<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionableItem extends Model
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
        'topic_id',
    ];
    
    public function status()
    {
        return $this->hasOne(ItemStatus::class);
    }
    
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
    
}
