<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\Pizza;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Pizza $pizza, Request $request)
    {
        // 1) validate the comment
        $attribute = $request->validate([
            'body' => 'required|min:4|max:500',
        ]); 
        // 2) store comment
        comment::create([
            'body' => $request->body,
            'user_id' => auth()->user()->id,
            'pizza_id' => $pizza->id,
        ]);
        // 3) redirect back
        return back();

    }
    public function delete(Comment $comment)
    {
        $this->authorize('destroy' , $comment);

            $comment->delete();
            
        return back();
    }
}
