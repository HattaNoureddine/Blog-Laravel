<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emailenvoyer extends Model
{
    use HasFactory;
    protected $table = 'email_envoyer';
    protected $fillable =['id', 'created_at', 'updated_at'];

}
