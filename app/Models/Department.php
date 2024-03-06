<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $allowedFields = [
        'id',
        'name',
    ];

    protected $fillable = [
        'name',
    ];
}
