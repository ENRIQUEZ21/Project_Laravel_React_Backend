<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add ingredient') }}
        </h2>
    </x-slot>
    <div class="py-6 sm:ml-24 sm:mr-24">
        <p class="sm:text-3xl xl:text-center"><i class="fa fa-plus"></i> New Ingredient</p>
        <form method="POST" action="{{ route('storeIngredient') }}" enctype="multipart/form-data">
            @csrf

            <div class="py-3">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 sm:w-64" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="py-3">
                <x-label for="quantity" :value="__('Quantity')" />

                <x-input id="quantity" class="block mt-1 sm:w-64" type="text" name="quantity" :value="old('quantity')" required autofocus />
            </div>

            <div class="py-3">
                <x-label for="image" :value="__('Image')" />

                <input id="image" class="block mt-1 sm:w-64" type="file" name="image" required />
            </div>

            <div class="py-3 hidden">
                <x-label for="recipe_id" :value="__('Recipe')" />

                <input id="recipe_id" class="block mt-1 sm:w-64" type="text" name="recipe_id" value="{{ $recipeId }}" required autofocus />
            </div>

            <x-button class="px-16 py-4 mt-6">
                {{ __('Add the ingredient to my recipe') }}
            </x-button>
        </form>
    </div>
</x-app-layout>
