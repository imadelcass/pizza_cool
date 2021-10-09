<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Pizza;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Pizza $pizza , Request $request)
    {
        if ($pizza->likedBy($request->user())) {
            dd('you already liked this pizza');
        }
        Like::create([
            'user_id' => auth()->user()->id,
            'pizza_id' => $pizza->id,
        ]);
        return back();        
    }
    public function destroy(Pizza $pizza , Request $request)
    {
       $pizza->likes()->where('user_id' , auth()->user()->id)->delete();
       return back();
    }
}