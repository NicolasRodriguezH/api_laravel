<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'names',
        'surnames',
        'age',
        'sex',
        'cedula',
        'tipo_sangre',
        'cel',
        'email',
        'addres',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
