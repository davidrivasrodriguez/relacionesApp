<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $table = 'comment';
    
    protected $fillable = ["nickname", "mail", "text", "post_id"];

    //relacion de post a comment: de 1 a muchos
    public function post(): BelongsTo{
        return $this->belongsTo(Post::class, 'post_id');
    }
}
