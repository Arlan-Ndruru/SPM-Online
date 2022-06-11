<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Mosque extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('slug', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')
                ->orWhere('name_ketua', 'like', '%' . $search . '%')
                ->orWhere('jtMasjid', 'like', '%' . $search . '%')
                ->orWhere('alamat', 'like', '%' . $search . '%')
                ->orWhere('ket', 'like', '%' . $search . '%')
                ->orWhere('no_hpMasjid', 'like', '%' . $search . '%');
        });
        $query->when($filters['searchDate'] ?? false, function ($query, $search) {
            return $query->where('created_at', 'like', '%' . $search . '%');
        });
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'kecm');
    }

    public function mustahiks()
    {
        return $this->hasMany(Mustahik::class);
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
