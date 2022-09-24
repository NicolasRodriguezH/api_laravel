<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /* protected $fillable = [
        'name', 'cedula', 'email',
    ]; */

    /* protected $hidden = [
        'created_at',
        'updated_at',
    ]; */
    use HasFactory;

}
