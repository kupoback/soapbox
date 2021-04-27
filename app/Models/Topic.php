<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ListOrderScope;

class Topic extends Model
{
    use HasFactory;
    
    protected $table = 'topics';
    
    protected $fillable = [
        'title',
        'description',
        'team_id',
        'status_id',
        'priority_status',
        'list_order',
        'request_delete',
        'archived',
    ];
    
    protected $hidden = [
        'created_by',
    ];
    
    protected $casts = [
        'created_at'  => 'date:F j, Y',
        'updated_at'  => 'date:F j, Y',
    ];
    
    public static function booted()
    {
        parent::booted();
        parent::addGlobalScope(new ListOrderScope());
    }
    
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    
    public function status()
    {
        return $this->hasOne(ItemStatus::class);
    }
    
    public function actionableItems()
    {
        return $this->hasMany(ActionableItem::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
}
