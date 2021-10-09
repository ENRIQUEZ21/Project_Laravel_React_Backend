<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Note the recipe ') }}
        </h2>
    </x-slot>

    <p class="text-center py-12 text-3xl"><i class="fa fa-trophy"></i>Give a note to the recipe</p>

    <div class="text-center">
        <form method="POST" action="{{ route('note-store', ['recipeId' => $recipeId]) }}">
            @csrf
            <div class="py-6">
                <x-label for="notation" :value="__('Your notation (on 10)')" />
                <x-input type="number" max="10" min="0" name="notation" id="notation" required />
            </div>
            <x-button>
                {{ ('Give the note') }}
            </x-button>
        </form>
    </div>



</x-app-layout>
