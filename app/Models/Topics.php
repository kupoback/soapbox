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
        'status_id',
        'priority_status',
        'list_order',
        'request_delete',
        'archived',
    ];
    
    protected $hidden = [
        'created_by',
    ];
    
    public function topic()
    {
        $status = $this->hasOne(ItemStatus::class);
        $action_items = $this->hasMany(ActionableItems::class);
        $comments = $this->hasMany(Comments::class);
        
        return (object) [
            'actionItems' => $action_items,
            'comments' => $comments,
            'status' => $status,
        ];
    }
    
    
}
