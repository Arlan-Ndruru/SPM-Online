<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mustahik extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('slug', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%');
        });
        $query->when($filters['searchDate'] ?? false, function ($query, $search) {
            return $query->where('updated_at', 'like', '%' . $search . '%');
        });
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function mosque()
    {
        return $this->belongsTo(Mosque::class, 'masjid');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
