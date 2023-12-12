<?php

namespace App\Models;

use App\Models\Post;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\HttpKernel\Profiler\Profile;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'description', 'image', 'created_at', 'updated_at'];

    public function posts(){
        return $this->hasMany(Post::class,'categorie_id','id');
    }


















}
