<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topics extends Model
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
    
    public function status()
    {
        return $this->hasOne(ItemStatus::class);
    }
    
    public function actionableItems()
    {
        $this->hasMany(ActionableItems::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
    
}
