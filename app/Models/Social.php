<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'facebook', 'twiter', 'youtube', 'instagram', 'skype', 'created_at', 'updated_at'];
    
}
