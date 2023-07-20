<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $table = 'students';

    protected $hidden = ['id', 'created_at', 'updated_at'];
}
