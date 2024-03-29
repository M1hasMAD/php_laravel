<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model // Entity + Repository in Java
{
    use HasFactory;
    use SoftDeletes; // adding a ability to soft delete
    protected $table = 'posts'; // like @Table(name = "posts") in Java
    protected $guarded = []; //or 'protected $fillable = false;' - allows to change all fields in db
    // the same thing, but can choose what you allow to change ->
    // -> protected $fillable = ['title', 'content', 'image', 'likes', 'is_published'];
}
