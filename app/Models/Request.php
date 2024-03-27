<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
 
    public $fillable = [
        "title",
        "description",
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
