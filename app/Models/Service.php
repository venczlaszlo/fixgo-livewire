<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'slug', 'name', 'desc', 'address', 'phone', 'email',
        'website', 'image', 'rating', 'opening_hours', 'features',
        'lat', 'lng', 'long_desc'
    ];


}
