<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pizza;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class PizzaController extends Controller
{
    public function index()
    {
            return view('pizzas.index', [
                'pizzas' => Pizza::with('likes')->latest()->filter()->paginate(5),
                'categories' => Category::all(),
            ]);
    }
    public function show(Pizza $pizza)
    {
        $comments = $pizza->comments->sortByDesc('created_at');
        return view('pizzas.show',[
            'pizza' => $pizza,
            'comments' => $comments, 
        ]);
    }
}
