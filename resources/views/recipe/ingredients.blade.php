<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ingredients in your recipe') }}
        </h2>
    </x-slot>
    @if($recipe != null)
        <p class="text-3xl text-center py-4"><i class="fa fa-cutlery"></i>{{ $recipe->name }}</p>
        <p class="sm:text-2xl xl:text-center py-4">Ingredients to use</p>
        @if(sizeof($ingredients) == 0)
            <p class="text-center py-6">There is no ingredients in your recipe. Choose ingredients.</p>
        @else
            <table class="w-11/12 m-auto">
                <thead>
                <tr>
                    <th colspan="5">Ingredients</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ingredients as $ingredient)
                    <tr class="text-center">
                        <td class="w-1/5"><img src="{{ asset('images/'.$ingredient->image) }}"></td>
                        <td><b class="text-2xl text-blue-500">{{ $ingredient->quantity }} of {{ $ingredient->name }}</b></td>
                        <td class="w-1/6 text-center"><p><a class="rounded-lg bg-red-600 sm:px-6 px-2 py-1 w-full" href="{{ route('deleteIngredient', ['ingredientId' => $ingredient->id]) }}"><i class="fa fa-trash"></i></a></p></td>
                        <td class="w-1/6">
                            <p><a class="rounded-lg bg-blue-600 sm:px-6 px-2 py-1 mt-4" href="{{ route('ingredient', ['ingredientId' => $ingredient->id]) }}"><i class="fa fa-eye"></i></a></p>
                        </td>
                        <td class="w-1/6">
                            <p><a class="rounded-lg bg-green-600 sm:px-6 px-2 py-1 mt-4" href="{{ route('editIngredient', ['ingredientId' => $ingredient->id]) }}"><i class="fa fa-pencil"></i></a></p>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        <p class="text-center py-12"><a class="rounded-3xl bg-green-500 text-white px-12 py-4" href="{{ route('createIngredient', ['recipeId' => $recipe->id]) }}"><i class="fa fa-plus"></i>Add ingredient</a></p>
        <p class="text-center py-12"><a class="bg-black text-white rounded-lg px-12 py-4" href="{{ route('recipe', ['recipeId' => $recipe->id]) }}">{{ __('Go on my recipe') }}</a></p>
    @else
        <p>There is a problem with your recipe</p>
    @endif


</x-app-layout>
