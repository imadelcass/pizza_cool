<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    public function scopeFilter($query)
    {
        // $pizzas = Pizza::latest();
        if(request('search')){
            $query
                ->where('name', 'like', '%'.request('search').'%')
                ->orWhere('text', 'like', '%'.request('search').'%')
                ->orWhere('slug', 'like', '%'.request('search').'%');
        }
    }

    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id' , $user->id);
    }
   // Pizza hasMany comments
   public function comments()
   {
       return $this->hasMany(comment::class);
   }
}
