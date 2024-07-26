<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventry extends Model
{
    use HasFactory;
    protected $table = "inventry";
    // protected $fillable = [
    //     'user_id',
    //     'post_name',
    //     'post_image',
    //     'post_description',
    //     'post_short_description',
    //     'status',
    // ];
}
