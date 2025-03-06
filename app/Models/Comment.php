<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['blog_post_id', 'parent_id', 'content'];

    public function blogPost() {
        return $this->belongsTo(BlogPost::class);
    }

    public function parent() {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function replies() {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
