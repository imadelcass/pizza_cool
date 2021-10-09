<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pizza_id'
    ];
    public function pizza()
    {
        return $this->hasOne(Pizza::class, 'id' , 'pizza_id');
    }
}
