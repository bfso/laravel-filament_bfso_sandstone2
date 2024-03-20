<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'number',
        'title',
        'responsible_id',
        'deputy_id',
        'department',
        'offset',
        'predecessor_id',
        'successor_id',
        'categories',
        'completed',
    ];

    public function responsibleUser(): BelongsTo {
        return $this->belongsTo(User::class, 'responsible_id', 'id');
    }
    
    public function deputyUser(): BelongsTo {
        return $this->belongsTo(User::class, 'deputy_id', 'id');
    }
    
    public function predecessorActivity(): BelongsTo {
        return $this->belongsTo(Activity::class, 'predecessor_id', 'id');
    }
    
    public function successorActivity(): BelongsTo {
        return $this->belongsTo(Activity::class, 'successor_id', 'id');
    }
    
}
