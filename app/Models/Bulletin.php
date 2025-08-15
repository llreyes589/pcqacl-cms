<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    use HasFactory;

    protected $fillable = ['uuid' ,'title', 'content', 'category_id', 'featured_photo', 'is_published'];
}
