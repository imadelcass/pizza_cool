<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'user_id',
        'pizza_id',
    ];
    //check if this comment belonge to logged user
    // public function belongeTo()
    // {
    //     return $this->user_id == auth()->user()->id;
    // }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
