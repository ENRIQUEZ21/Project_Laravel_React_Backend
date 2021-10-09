<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ingredient') }}
        </h2>
    </x-slot>
    <div class="py-6 sm:ml-24 sm:mr-24">
        <p class="text-3xl py-6 text-center"><i class="fa fa-cutlery"></i> {{ $ingredient->name }}</p>
        @if(Auth::user()->id == $recipe->user_id)
            <p class="text-center py-8"><a class="rounded-lg bg-red-600 text-white px-12 py-4" href="{{ route('deleteIngredient', ['ingredientId' => $ingredient->id]) }}"><i class="fa fa-trash"></i> Delete</a>
                <a class="rounded-lg bg-green-600 text-white px-12 py-4" href="{{ route('editIngredient', ['ingredientId' => $ingredient->id]) }}"><i class="fa fa-pencil"></i> Edit</a>
            </p>
        @endif
        <div class="py-6">
            <img class="m-auto block w-2/5" src="{{ asset('images/'.$ingredient->image) }}">
        </div>
        <p class="py-3 text-center text-2xl">{{ $ingredient->quantity }}</p>
    </div>
</x-app-layout>
