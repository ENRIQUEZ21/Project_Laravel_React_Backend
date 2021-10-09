<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recipe created') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:ml-24 sm:mr-24 text-center">
        @if($recipe != null)
            <p class="text-3xl py-6 text-center"><i class="fa fa-cutlery"></i> {{ $recipe->name }}</p>
            @if(Auth::user()->id == $recipe->user_id)
                <p class="py-16"> <a class="rounded-lg bg-green-600 text-white px-12 py-4" href="{{ route('editRecipe', ['recipeId' => $recipe->id]) }}"><i class="fa fa-pencil"></i>Update</a>
                    <a class="rounded-lg bg-red-600 text-white px-12 py-4" href="{{ route('deleteRecipe', ['recipeId' => $recipe->id]) }}"><i class="fa fa-trash"></i>Delete</a>
                </p>
            @endif
            <img  src="{{ asset('images/'.$recipe->image) }}" class="w-2/5 m-auto block">
            <p class="py-3"><b>Name of the recipe: </b>{{ $recipe->name }}</p>
            <p class="py-3"><b>Type of recipe: </b> {{ $recipe->type }}</p>
            <p class="py-3"><b>Date of creation: </b> {{ $recipe->created_at }}</p>
            <p class="py-3"><b>Region of origin: </b> {{ $recipe->region }}
                <img src="{{ asset('images/'.$recipe->region.'.png') }}" style="width: 80px" class="m-auto block">
            </p>
            <b>Instructions to make: </b><p>{{ $recipe->instructions }}</p>
            <p class="py-3"><b>Duration: </b> {{ $recipe->duration }}</p>
            <p class="py-3"><b>Number of persons: </b> {{ $recipe->number_persons }}</p>
            <p class="py-6"><b>Notation of the recipe: </b>
                @if($recipe->notation == null)
                    No notation
                @else
                {{ $recipe->notation }} / 10
                @endif</p>
            @if($recipe->user_id != Auth::user()->id)
                <p class="text-center py-3"><a class="rounded-lg bg-black text-white px-4 py-2" href="{{ route('note', ['recipeId' => $recipe->id]) }}">Give a note</a></p>
            @endif
            <p class="py-12"><b>Ingredients to use: </b></p>
            @if(Auth::user()->id == $recipe->user_id)
                <p class="text-center py-6"><a class="rounded-lg bg-blue-600 text-white px-12 py-4" href="{{ route('recipeIngredients', ['recipeId' => $recipe->id]) }}"><i class="fa fa-eye"></i> View your ingredients</a></p>
            @endif
            @if(sizeof($ingredients) == 0)
                <p class="py-3 text-center">No ingredient in this recipe</p>
            @else
                @for($i = 0; $i < ceil($count/3); $i++)
                    <div class="sm:flex sm:flex-row">
                        @for($j = 0; $j < 3; $j++)
                            @if($i*3+$j < $count)
                                <p class="bg-blue-100 sm:w-1/4 text-center rounded-lg py-2 px-4 mt-4 ml-8 mr-4">
                                    <a href="{{ route('ingredient', ['ingredientId' => $ingredients[$i*3+$j]->id]) }}">
                                        <b class="py-3 w-1/4 text-center">{{ $ingredients[$i*3+$j]->quantity }} of {{ $ingredients[$i*3+$j]->name }} </b>
                                        <img class="m-auto" src="{{ asset('images/'.$ingredients[$i*3+$j]->image) }}">
                                    </a>
                                </p>
                            @endif
                         @endfor
                    </div>
                @endfor
            @endif
        @else
            <p class="text-2xl text-center">There is a problem with your recipe</p>
        @endif

    </div>



</x-app-layout>
