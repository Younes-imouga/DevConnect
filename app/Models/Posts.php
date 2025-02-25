<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function likes()
    {
        return $this->hasMany(Likes::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'post_tag');
    }

    // Define the relationship with Content
    public function content()
    {
        return $this->hasMany(Content::class);
    }
}
