<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'description', 'image', 'categorie_id', 'created_at', 'updated_at', 'pt_description'];

    public function categorie(){
        return $this->belongsTo(Categorie::class,'categorie_id','id');
    }

    public function reviews(){
        return $this->hasMany(Review::class,'post_id','id');
    }
}
