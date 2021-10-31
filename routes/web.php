<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\IngredientController;
use App\Http\Controllers\Web\RecipeController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['namespace' => 'Web'], function(){
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth'])->name('dashboard');

    Route::get('/makeadmin', [UserController::class, 'makeAdmin'])->middleware(['auth'])->name('makeAdmin');
    Route::get('/user/index/{userId}', [UserController::class, 'index'])->middleware(['auth'])->name('user');
    Route::get('/user/edit', [UserController::class, 'edit'])->middleware(['auth'])->name('editUser');
    Route::post('/user/update', [UserController::class, 'update'])->middleware(['auth'])->name('updateUser');
    Route::get('/user/all', [UserController::class, 'allUsers'])->middleware(['auth'])->name('allUsers');
    Route::get('/user/ban/{userId}', [UserController::class, 'banUser'])->middleware(['auth'])->name('banUser');
    Route::get('/user/restore/{userId}', [UserController::class, 'restoreUser'])->middleware(['auth'])->name('restoreUser');
    Route::get('/user/banned/users', [UserController::class, 'bannedUsers'])->middleware(['auth'])->name('bannedUsers');

    Route::get('/recipe/create', [RecipeController::class, 'create'])->middleware(['auth'])->name('createRecipe');
    Route::post('/recipe/store', [RecipeController::class, 'store'])->middleware(['auth'])->name('storeRecipe');
    Route::get('/recipe/{recipeId}', [RecipeController::class, 'index'])->middleware(['auth'])->name('recipe');
    Route::get('/recipe/ingredients/{recipeId}', [RecipeController::class, 'ingredients'])->middleware(['auth'])->name('recipeIngredients');
    Route::get('/recipe/edit/{recipeId}', [RecipeController::class, 'edit'])->middleware(['auth'])->name('editRecipe');
    Route::post('/recipe/update/{recipeId}', [RecipeController::class, 'update'])->middleware(['auth'])->name('updateRecipe');
    Route::get('/recipe/delete/{recipeId}', [RecipeController::class, 'delete'])->middleware(['auth'])->name('deleteRecipe');
    Route::get('/recipe/all/user/{userId}', [RecipeController::class, 'findAllUser'])->middleware(['auth'])->name('allRecipes');
    Route::get('/recipe/all/users', [RecipeController::class, 'findForAllUsers'])->middleware(['auth'])->name('allUsersRecipes');
    Route::get('/recipe/all/users/mealStarters', [RecipeController::class, 'findMealStartersForAllUsers'])->middleware(['auth'])->name('allUsersMealStartersRecipes');
    Route::get('/recipe/all/users/mainDishes', [RecipeController::class, 'findMainDishesForAllUsers'])->middleware(['auth'])->name('allUsersMainDishesRecipes');
    Route::get('/recipe/all/users/desserts', [RecipeController::class, 'findDessertsForAllUsers'])->middleware(['auth'])->name('allUsersDessertsRecipes');
    Route::get('/recipe/region/{region}', [RecipeController::class, 'findByRegion'])->middleware(['auth'])->name('byRegionRecipes');
    Route::get('/recipe/note/{recipeId}', [RecipeController::class, 'note'])->middleware(['auth'])->name('note');
    Route::post('/recipe/note/store/{recipeId}', [RecipeController::class, 'noteStore'])->middleware(['auth'])->name('note-store');

    Route::get('/recipe/add/ingredient/{recipeId}', [IngredientController::class, 'create'])->middleware(['auth'])->name('createIngredient');
    Route::post('/recipe/store/ingredient', [IngredientController::class, 'store'])->middleware(['auth'])->name('storeIngredient');
    Route::get('/recipe/delete/ingredient/{ingredientId}', [IngredientController::class, 'delete'])->middleware(['auth'])->name('deleteIngredient');
    Route::get('/recipe/ingredient/{ingredientId}', [IngredientController::class, 'index'])->middleware(['auth'])->name('ingredient');
    Route::get('/recipe/edit/ingredient/{ingredientId}', [IngredientController::class, 'edit'])->middleware(['auth'])->name('editIngredient');
    Route::post('/recipe/update/ingredient/{ingredientId}', [IngredientController::class, 'update'])->middleware(['auth'])->name('updateIngredient');

});

Route::group(['namespace' => 'Api', 'prefix' => 'api/v1'], function(){
    Route::get('/', [\App\Http\Controllers\Api\UserController::class, 'show'])->middleware(['auth'])->name('essai');
});

require __DIR__.'/auth.php';
