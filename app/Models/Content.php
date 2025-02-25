<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'posts_id',
        'type',
        'content',
    ];

    public function post()
    {
        return $this->belongsTo(Posts::class);
    }
}
