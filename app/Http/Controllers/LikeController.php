<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $recipe = Recipe::find($request->recipe_id);
        $like = Like::where('user_id', $user->id)->where('recipe_id', $recipe->id);
        if (count($like->get())) {
            $like->delete();
        }
        else {
            Like::create([
                'user_id' => $user->id,
                'recipe_id' => $recipe->id
            ]);
        }
        return redirect()->route('recipes.show', [$recipe]);
    }
}
