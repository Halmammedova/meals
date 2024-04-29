<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function categoryName()
    {
        return $this->belongsTo(CategoryName::class);
    }


    public function level()
    {
        return $this->belongsTo(Level::class);
    }


    public function Duration()
    {
        return $this->belongsTo(Duration::class);
    }
}
