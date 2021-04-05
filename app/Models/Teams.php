<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;
    
    protected $table = 'teams';
    
    protected $fillable = [
        'title',
        'description',
    ];
    
    public function list()
    {
    
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function topics()
    {
        return response()->json(['data' => 'hello']);
        // return $this->hasMany(Topics::class);
    }
    
}
