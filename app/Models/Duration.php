<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
