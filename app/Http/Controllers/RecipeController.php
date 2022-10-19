<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $recipes = Recipe::paginate(4);
        return view('recipes.list')->with('recipes', $recipes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('recipes.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'title' => 'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'body' => 'required',
            'category_id' => 'required'
        ]);
        if ($request->cover_image) {
            $name = uniqid() . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('images/recipes'), $name);
        }
        Recipe::create([
            'title' => $request->title,
            'cover_image' => $name,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'user_id' => $user->id,
        ]);
        return redirect()->route('dashboard')->with('Success', 'Recipe Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('recipes.show')->with('recipe', $recipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        $user = Auth::user();
        if ($user->id != $recipe->user_id) {
            abort(403);
        }
        return view('recipes.edit')->with('recipe', $recipe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $user = Auth::user();
        $request->validate([
            'title' => 'required|max:255',
            'cover_image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'body' => 'required',
            'category_id' => 'required',
        ]);
        $name = $recipe->cover_image;
        if ($request->cover_image) {
            $name = uniqid() . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('images/recipes'), $name);
        }
        $recipe->update([
            'title' => $request->title,
            'cover_image' => $name,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'user_id' => $user->id,
        ]);
        return redirect()->route('dashboard')->with('Success', 'Recipe Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('dashboard')
            ->with('Success', 'Recipe deleted!');
    }
}
