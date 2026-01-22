<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = 
    [ 
        'name', 
        'price', 
        'description', 
        'image', 
        'season', 
    ];
    public function seasons()
    {
        return $this->belongsToMany(Season::class, 'product_season');
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }
        return $query;
    }
}
