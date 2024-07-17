<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "icon",
        "created_at",
        "updated_at",
    ];

    public function post()
    {
        return $this->belongsToMany(Post::class);
    }
}
