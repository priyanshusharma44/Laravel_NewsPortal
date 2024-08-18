<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Only include attributes that should be mass-assignable
    protected $fillable = ['content', 'article_id'];

    // Define relationship with the Article model
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
