<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function toggle($recipe_id, $user_id)
    {
        $like = Like::where('user_id', $user_id)->where('recipe_id', $recipe_id);
        if (count($like->get())) {
            $like->delete();
            return ['alert' => 'Like deleted successfully'];
        } else {
            Like::create([
                'user_id' => $user_id,
                'recipe_id' => $recipe_id
            ]);
        }
        return ['alert' => 'Like created successfully'];
    }

    public function liked($recipe_id, $user_id)
    {
        $like = Like::where('user_id', $user_id)->where('recipe_id', $recipe_id);
        if(count($like->get())) {
            return true;
        }
        return false;
    }
}