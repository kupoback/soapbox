<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStatus extends Model
{
    use HasFactory;
    
    protected $table = 'item_status';
    
    protected $fillable = [
        'status',
    ];
    
    public function item()
    {
        return $this->belongsTo(ActionableItems::class);
    }
    
    public function topic()
    {
        return $this->belongsTo(Topics::class);
    }
    
}
