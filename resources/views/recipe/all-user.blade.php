<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recipes') }}
        </h2>
    </x-slot>

    <p class="text-3xl text-center py-6"><i class="fa fa-cutlery"></i>All the recipes</p>
    @if(sizeof($recipes) == 0)
        <p class="text-center">You have not any recipes</p>
    @else
        <table class="w-11/12 m-auto">
            <thead>
            <tr>
                <th>Recipe name</th>
                <th class="w-1/6">Image</th>
                <th>From</th>
                <th class="w-1/12">View</th>
                @if(\Illuminate\Support\Facades\Auth::id() == $userId)
                    <th class="w-1/12">Update</th>
                    <th class="w-1/12">Delete</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($recipes as $recipe)
                <tr class="text-center">
                    <td><b>{{ $recipe->name }}</b></td>
                    <td><img class="m-auto block w-4/5" src="{{ asset('images/'.$recipe->image) }}"></td>
                    <td>{{ $recipe->region }}</td>
                    <td><p><a class="rounded-lg bg-blue-600 text-white px-2 sm:px-4 sm:py-1" href="{{ route('recipe', ['recipeId' => $recipe->id]) }}"><i class="fa fa-eye"></i></a></p></td>
                    @if(\Illuminate\Support\Facades\Auth::id() == $userId)
                        <td><p><a class="rounded-lg bg-green-600 text-white px-2 sm:px-4 sm:py-1" href="{{ route('editRecipe', ['recipeId' => $recipe->id]) }}"><i class="fa fa-pencil"></i></a></p></td>
                        <td><p><a class="rounded-lg bg-red-600 text-white px-2 sm:px-4 sm:py-1" href="{{ route('deleteRecipe', ['recipeId' => $recipe->id]) }}"><i class="fa fa-trash"></i></a></p></td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

</x-app-layout>
