<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit ingredient') }}
        </h2>
    </x-slot>
    <div class="py-6 sm:ml-24 ml-8 sm:mr-24">
        <p class="sm:text-3xl text-2xl text-center"><i class="fa fa-pencil"></i> Edit Ingredient</p>
        <form method="POST" action="{{ route('updateIngredient', ['ingredientId' => $ingredient->id]) }}" enctype="multipart/form-data">
            @csrf

            <div class="py-3">
                <x-label for="name" :value="__('Name')" />

                <input id="name" class="block mt-1 sm:w-64 rounded-lg" type="text" name="name" value="{{ $ingredient->name }}" required autofocus />
            </div>

            <div class="py-3">
                <x-label for="quantity" :value="__('Quantity')" />

                <input id="quantity" class="block mt-1 sm:w-64 rounded-lg" type="text" name="quantity" value="{{ $ingredient->quantity }}" required autofocus />
            </div>


            <x-button class="px-16 py-4 mt-6">
                {{ __('Update the ingredient in my recipe') }}
            </x-button>
        </form>
    </div>
</x-app-layout>
