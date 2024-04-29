<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryName extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
