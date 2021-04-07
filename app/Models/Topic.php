<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    
    public function team()
    {
        return $this->hasOne(Team::class);
    }
    
    public function status()
    {
        return $this->hasOne(ItemStatus::class);
    }
    
    public function actionableItems()
    {
        $this->hasMany(ActionableItem::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
}
