<?php


namespace App\Http\Controllers\Web;


use App\Models\CookingRecipe;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function __construct()
    {
        $this->user = Auth::user();
        $this->regions = ["Île-de-France", "Centre", "Haute-Normandie", "Basse-Normandie", "Nord-Pas-de-Calais", "Pays de la Loire",
            "Midi-Pyrénées", "Aquitaine", "Poitou-Charentes", "Champagne-Ardenne", "Limousin", "Rhône-Alpes", "Bourgogne",
            "Picardie", "Provence-Alpes-Côte d'Azur", "Languedoc-Roussillon", "Martinique", "Bretagne", "Guyane", "La Réunion",
            "Mayotte", "Auvergne", "Alsace", "Franche-Comté", "Lorraine", "Corse", "Guadeloupe"];
    }

    public function index() {
        $recipes = CookingRecipe::where('user_id', Auth::id())->limit(10)->get();
        $bestRecipes = CookingRecipe::orderBy('notation', 'desc')->limit(10)->get();
        $latestRecipes = CookingRecipe::orderBy('created_at', 'desc')->limit(10)->get();
        $quickestRecipes = CookingRecipe::orderBy('duration', 'asc')->limit(10)->get();
        return view('dashboard', [
            'recipes'=>$recipes,
            'bestRecipes' => $bestRecipes,
            'latestRecipes' => $latestRecipes,
            'quickestRecipes' => $quickestRecipes,
            'regions' => $this->regions
        ]);
    }


}
