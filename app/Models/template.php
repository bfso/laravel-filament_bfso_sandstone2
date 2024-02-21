<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class template extends Model
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
}
