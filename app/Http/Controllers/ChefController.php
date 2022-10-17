<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function chef($id)
    {
        $chef = User::find($id);
        $recipes = $chef->recipes()->paginate(4);
        return view('chef')->with('recipes', $recipes)->with('chef', $chef);
    }
}
