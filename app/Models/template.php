<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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



    public function creator_user(): BelongsTo {
        return $this->belongsTo(User::class, 'creator' , 'id');
    }

    public function responsible_user(): BelongsTo {
        return $this->belongsTo(User::class, 'responsible' , 'id');
    }
    public function last_update_by_user(): BelongsTo {
        return $this->belongsTo(User::class, 'last_update_by' , 'id');
    }
    public function represented_user(): BelongsTo {
        return $this->belongsTo(User::class, 'represented' , 'id');
    }
}
