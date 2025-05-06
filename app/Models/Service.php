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

    public function favoredByUsers()
    {
        return $this->belongsToMany(User::class, 'favorite_services')->withTimestamps();
    }

    public function toggleFavorite(Service $service)
    {
        $user = auth()->user();

        if ($user->favoriteServices()->where('service_id', $service->id)->exists()) {
            $user->favoriteServices()->detach($service->id);
        } else {
            $user->favoriteServices()->attach($service->id);
        }

        return back();
    }




}
