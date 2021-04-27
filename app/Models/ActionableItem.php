<?php

namespace App\Models;

use App\Scopes\ListOrderScope;
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
    
    // public static function booted()
    // {
    //     parent::addGlobalScope(new ListOrderScope());
    // }
    
    public static function booted()
    {
        parent::booted();
        parent::addGlobalScope(new ListOrderScope());
    }
    
    public function status()
    {
        return $this->hasOne(ItemStatus::class);
    }
    
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
    
}
