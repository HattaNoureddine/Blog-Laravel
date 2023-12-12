<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'rate', 'content', 'user_id', 'post_id', 'created_at', 'updated_at'];

    public function post(){
        return $this->belongsTo(Post::class,'post_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
