<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    public $dir = '/images/posts/';

    protected $casts = [
    ];

    protected $table = 'posts';

    protected $fillable = ['title', 'description', 'is_publish', 'status', 'user_id', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getImageAttribute($value)
    {
        return $this->dir. $value;
    }

}
