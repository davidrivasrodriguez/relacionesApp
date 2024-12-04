<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model {

    use hasFactory;
    protected $table = 'post';

    protected $fillable = ["enter", "text", "title"];

    //relacion de comments a post: de 1 a Muchos
    public function comments(): HasMany {
        return $this->hasMany(Comment::class, 'post_id');
    }

}
