<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Http\Requests\IngredientRequest;
use App\Models\CookingRecipe;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IngredientController extends Controller
{
    public function __construct()
    {
        $this->user= Auth::user();
    }


    public function index($ingredientId) {
        $ingredient = Ingredient::find($ingredientId);
        $recipeId = $ingredient->recipe_id;
        $recipe = CookingRecipe::find($recipeId);
        return view('ingredient.index', [
            'ingredient' => $ingredient,
            'recipe' => $recipe
        ]);
    }

    public function create($recipeId) {
        return view('ingredient.create', [
            'recipeId' => $recipeId
        ]);
    }

    public function store(IngredientRequest $request) {
        $input = $request->all();
        $recipeId = $input['recipe_id'];
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }
        Ingredient::create($input);
        return redirect()->route('recipeIngredients', ['recipeId' => $recipeId]);
    }

    public function edit($ingredientId) {
        $ingredient = Ingredient::find($ingredientId);
        return view('ingredient.edit', [
            'ingredient' => $ingredient
        ]);
    }

    public function update(Request $request, $ingredientId) {
        $ingredient = Ingredient::find($ingredientId);
        $ingredient->name = $request->name;
        $ingredient->quantity = $request->quantity;
        $ingredient->save();
        $recipeId = $ingredient->recipe_id;
        return redirect()->route('recipeIngredients', ['recipeId' => $recipeId]);
    }

    public function delete($ingredientId) {
        $ingredient = Ingredient::find($ingredientId);
        $recipeId = $ingredient->recipe_id;
        $ingredient->delete();
        return redirect()->route('recipeIngredients', ['recipeId' => $recipeId]);
    }

}
