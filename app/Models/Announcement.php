<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function images()
    {
        return $this->hasMany(Image::class, 'announcement_id');;
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
