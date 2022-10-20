<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function toggle(Request $request)
    {
        $user = Auth::user();
        $recipe = Recipe::find($request->recipeId);
        $like = Like::where('user_id', $user->id)->where('recipe_id', $recipe->id);
        if (count($like->get())) {
            $like->delete();
        }
        else {
            Like::create([
                'user_id' =>$user->id,
                'recipe_id' => $recipe->id
            ]);
        }
        return ['alert' => 'Like created successfully'];
    }
}
