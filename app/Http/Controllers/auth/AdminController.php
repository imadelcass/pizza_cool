<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return  view('admin.index',[
            'categories' => Category::all(),
        ]);
    }
    public function edit(Category $category)
    {
        // dd($category);
        return view('admin.categoryEdit', [
            'category' => $category,
        ]);

    }
    public function update(Request $request)
    {
        // dd($request->all());
        if ($request->submit == "save") {
        // validate the request
        $attribute = request()->validate([
            'title' => 'required|min:2|max:255',
            'upload_img' => 'required|mimes:jpg,png,jpeg|max:5000',
        ]);
        $path = time(). "." .$request->upload_img->extension();

        $request->upload_img->move(public_path('img'),$path);

        $pizza = Category::find($request->id);
        // dd($pizza);
        $pizza->name = $request->title;
        $pizza->img = $path;
        $pizza->save();
        return redirect()->route('admin');
        
        }
        elseif ($request->submit == "remove") {

            $pizza = Category::find($request->id);
            $pizza->delete();
            return redirect()->route('admin');

        }elseif($request->submit == "create"){
            //validate the request
            $attribute = request()->validate([
                'title' => 'required|min:2|max:255',
                'upload_img' => 'required|mimes:jpg,png,jpeg|max:5000',
            ]);
            $path = time(). "." .$request->upload_img->extension();

            $request->upload_img->move(public_path('img'),$path);

            $category = new Category();

            $category->name = $request->title;
            $category->img = $path;
            $category->save();
            return redirect()->route('admin');
}
    }
}
