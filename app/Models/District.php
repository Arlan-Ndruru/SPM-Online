<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('slug', 'like', '%' . $search . '%')
                ->orWhere('kota', 'like', '%' . $search . '%')
                ->orWhere('ket', 'like', '%' . $search . '%');
        });
        $query->when($filters['searchDate'] ?? false, function ($query, $search) {
            return $query->where('created_at', 'like', '%' . $search . '%');
        });
    }

    public function mosques()
    {
        return $this->hasMany(Mosque::class);
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
