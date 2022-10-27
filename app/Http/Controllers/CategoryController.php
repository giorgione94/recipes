<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'subtitle' => 'required',
        ]);
        if ($request->cover_image) {
            $name = uniqid() . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('images/categories'), $name);
        }
        Category::create([
            'title' => $request->title,
            'cover_image' => $name,
            'subtitle' => $request->subtitle,
        ]);
        return redirect()->route('dashboard')->with('success', 'Category Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $recipes = $category->recipes()->paginate(8);
        return view('categories.show')->with('category', $category)->with('recipes', $recipes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'subtitle' => 'required',

        ]);
        $name = $category->cover_image;
        if ($request->cover_image) {
            $name = uniqid() . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('images/categories'), $name);
        }
        $category->update([
            'title' => $request->title,
            'cover_image' => $name,
            'subtitle' => $request->subtitle,
        ]);
        return redirect()->route('dashboard')->with('Success', 'Category Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('dashboard')
            ->with('Success', 'Category deleted!');
    }
}