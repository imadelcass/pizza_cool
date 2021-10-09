<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'img'];

    public function pizzas()
    {
        return $this->hasMany(Pizza::class,'category_name', 'name');
    }
}
