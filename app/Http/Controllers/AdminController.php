<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Foundation\Auth\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $recipes = Recipe::where('user_id', $user_id)->with('category')->paginate(6);
        return view('admin.dashboard')->with('recipes', $recipes);
    }

    public function profile() {
        $chef = Auth::user();
        return view('admin.profile')->with('chef', $chef);
    }

    public function recipe (Recipe $recipe)
    {
        $user = Auth::user();
        if($user->id != $recipe->user_id) {
            abort(403);
        }
        return $recipe;
    }

    public function category (Category $category) {
        return $category;
    }
    
    public function updateProfile(Request $request) {
        
        $request->validate([
            'name' => 'required',
            'bio' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $name = $user->profile_image;
        if ($request->profile_image) {
            $name = uniqid() . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('images/chefs'), $name);
        }
        $user->name = $request->name;
        $user->bio = $request->bio;
        $user->profile_image = $name;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'User Updated!');
    }
    
   
}