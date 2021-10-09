<?php


namespace App\Http\Controllers\Web;




use App\Http\Requests\RecipeRequest;
use App\Models\CookingRecipe;
use App\Models\Ingredient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class RecipeController extends Controller
{
    public function __construct()
    {
        $this->user = Auth::user();
        $this->regions = ["Île-de-France", "Centre", "Haute-Normandie", "Basse-Normandie", "Nord-Pas-de-Calais", "Pays de la Loire",
            "Midi-Pyrénées", "Aquitaine", "Poitou-Charentes", "Champagne-Ardenne", "Limousin", "Rhône-Alpes", "Bourgogne",
            "Picardie", "Provence-Alpes-Côte d'Azur", "Languedoc-Roussillon", "Martinique", "Bretagne", "Guyane", "La Réunion",
            "Mayotte", "Auvergne", "Alsace", "Franche-Comté", "Lorraine", "Corse", "Guadeloupe"];
        $this->types = ["Entrée", "Plat", "Dessert"];
    }

    public function create() {
        $regions = $this->regions;
        $types = $this->types;
        return view('recipe.create', ['regions' => $regions, 'types' => $types]);
    }

    public function edit($recipeId) {
        $recipe = CookingRecipe::find($recipeId);
        return view('recipe.edit', ['recipe' => $recipe]);
    }

    public function update(Request $request, $recipeId) {
        $recipe = CookingRecipe::find($recipeId);
        $recipe->instructions = $request->instructions;
        $recipe->duration = $request->duration;
        $recipe->number_persons = $request->number_persons;
        $recipe->save();
        return redirect()->route('recipe', ['recipeId' => $recipeId]);
    }

    public function store(RecipeRequest $request) {
        $input = $request->all();
        $input['notation'] = null;
        $input['user_id'] = Auth::id();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }
        $recipe = CookingRecipe::create($input);
        $recipeId = $recipe->id;
        return redirect()->route('recipeIngredients', ['recipeId' => $recipeId]);
    }

    public function ingredients($recipeId) {
        $recipe = CookingRecipe::find($recipeId);
        $ingredients = Ingredient::where('recipe_id', $recipeId)->get();
        return view('recipe.ingredients', ['recipe' => $recipe, 'ingredients' => $ingredients]);
    }

    public function index($recipeId) {
        $recipe = CookingRecipe::find($recipeId);
        $ingredients = Ingredient::where('recipe_id', $recipeId)->get();
        $count = count($ingredients);
        return view('recipe.index', [
            'recipe'=> $recipe,
            'count' => $count,
            'ingredients' => $ingredients
        ]);
    }

    public function note($recipeId) {
        return view('recipe.notation', [
            'recipeId' => $recipeId
        ]);
    }

    public function noteStore(Request $request, $recipeId) {
        $notationGiven = $request->notation;
        if(0 <= $notationGiven && $notationGiven <= 10) {
            $recipe = CookingRecipe::find($recipeId);
            $notation = $recipe->notation;
            $numberNotations = $recipe->number_notations;
            if($numberNotations == 0) {
                $notation = $notationGiven;
            } else {
                $notation = ($notation*$numberNotations+$notationGiven)/($numberNotations+1);
            }
            $numberNotations++;
            $recipe->notation = $notation;
            $recipe->number_notations = $numberNotations;
            $recipe->save();
        }
        return redirect()->route('recipe', ['recipeId' => $recipeId]);
    }

    public function findAllUser($userId) {
        $recipes = CookingRecipe::where('user_id', '=', $userId)->get();
        return view('recipe.all-user', [
            'recipes' => $recipes,
            'userId' => $userId
        ]);
    }

    public function findForAllUsers() {
        $recipes = CookingRecipe::all();
        return view('recipe.all-users');
    }

    public function findMealStartersForAllUsers() {
        $recipes = CookingRecipe::where('type', '=', 'Entrée')->get();
        return view('recipe.meal-starters', [
            'recipes' => $recipes
        ]);
    }

    public function findMainDishesForAllUsers() {
        $recipes = CookingRecipe::where('type', '=', 'Plat')->get();
        return view('recipe.main-dishes', [
            'recipes' => $recipes
        ]);
    }

    public function findDessertsForAllUsers() {
        $recipes = CookingRecipe::where('type', '=', 'Dessert')->get();
        return view('recipe.desserts', [
            'recipes' => $recipes
        ]);
    }

    public function findByRegion($region) {
        $recipes = CookingRecipe::where('region', '=', $region)->get();
        return view('recipe.region_recipes', [
            'recipes' => $recipes,
            'region' => $region
        ]);
    }



    public function delete($recipeId) {
        $recipe = CookingRecipe::find($recipeId);
        $recipe->delete();
        $recipes = CookingRecipe::where('user_id', '=', Auth::id())->get();
        return view('recipe.all-user', [
            'recipes' => $recipes
        ]);
    }




}
