<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionableItem extends Model
{
    use HasFactory;
    
    protected $table = 'actionable_items';
    
    protected $fillable = [
        'topic_id',
        'title',
        'status_id',
        'list_order',
        'created_by',
    ];
    
    protected $casts = [
        'created_at'  => 'date:F j, Y H:i',
    ];
    
    protected $hidden = [
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
