<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Teams extends Model
{
    use HasFactory;
    
    protected $table = 'teams';
    
    // protected $dateFormat = 'F j, Y H:i';
    
    protected $fillable = [
        'title',
        'description',
        'slug',
    ];
    
    public function setDateAttribute( $value ) {
        $this->attributes['date'] = (new Carbon($value))->format('F j, Y H:i');
    }
    
    public function list()
    {
        // return $this;
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function topics()
    {
        return $this->hasMany(Topics::class);
    }
    
}
