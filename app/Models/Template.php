<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Template extends Model
{
    use HasFactory;

    //write an methode to insert dat in table process
    public function insertData($data){
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->save();
        return 1;
    }



    protected $fillable =['title','creator', 'responsible', 'represented', 'is_active', 'last_update_by'];

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