<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'creator',
        'responsible',
        'represented',
        'last_update_by',
        'is_active',
        'date',        
    ];

    public function creator(){
        return $this->belongsTo(User::class,'creator','id');
    }
    public function responsible(){
        return $this->belongsTo(User::class,'responsible','id');
    }
    public function represented(){
        return $this->belongsTo(User::class,'represented','id');
    }
}
