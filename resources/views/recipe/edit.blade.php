<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recipe created') }}
        </h2>
    </x-slot>
    <p class="py-12 text-3xl text-center"><i class="fa fa-cutlery"></i>{{ $recipe->name }}</p>
    <div class="text-center">
        <form method="POST" action="{{ route('updateRecipe', ['recipeId' => $recipe->id]) }}">
            @csrf
            <div class="py-6">
                <x-label for="instructions" :value="__('Instructions')" />

                <textarea id="instructions" class="block mt-1 w-full rounded-lg" name="instructions" oninput="updateTextareaHeight(this);" required autofocus>
                {{ $recipe->instructions }}
                </textarea>
            </div>

            <div class="py-6">
                <x-label for="duration" :value="__('Duration')" />

                <x-input id="duration" type="time" class="block mt-1 sm:w-64 m-auto" value="{{ $recipe->duration }}" name="duration" required />
            </div>

            <div class="py-3">
                <x-label for="number_persons" :value="__('For how much persons ?')" />

                <x-input id="number_persons" class="block mt-1 sm:w-64 m-auto" type="number" name="number_persons" value="{{$recipe->number_persons }}" required />
            </div>

            <x-button class="px-32 py-4">
                {{ __('Update the Recipe') }}
            </x-button>
        </form>

    </div>
</x-app-layout>
