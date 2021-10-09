<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create recipe') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:ml-24 sm:mr-24">
        <p class="sm:text-3xl xl:text-center"><i class="fa fa-plus"></i> New Recipe</p>
        <form method="POST" action="{{ route('storeRecipe') }}" enctype="multipart/form-data">
            @csrf

            <div class="py-3">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 sm:w-64" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="py-3">
                <x-label for="region" :value="__('From')" />

                <select name="region" id="region" class="rounded-lg">
                    @foreach($regions as $region)
                        <option value="{{ $region }}">{{ $region }}</option>
                    @endforeach
                </select>

            </div>

            <div class="py-3">
                <x-label for="instructions" :value="__('Instructions')" />

                <textarea id="instructions" class="block mt-1 w-full rounded-lg" name="instructions" oninput="updateTextareaHeight(this);" required>
            </textarea>
            </div>

            <div class="py-3">
                <x-label for="duration" :value="__('Duration')" />

                <x-input id="duration" class="block mt-1 sm:w-64" type="time" name="duration" :value="old('duration')" required />
            </div>

            <div class="py-3">
                <x-label for="number_persons" :value="__('For how much persons ?')" />

                <x-input id="number_persons" class="block mt-1 sm:w-64" type="number" name="number_persons" :value="old('number_persons')" required />
            </div>

            <div class="py-3">
                <x-label for="type" :value="__('Type of food')" />

                <select name="type" id="type" class="rounded-lg">
                    @foreach($types as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="py-3">
                <x-label for="image" :value="__('Image')" />

                <x-input id="image" class="block mt-1 sm:w-64" type="file" name="image" required />
            </div>


            <x-button class="xl:ml-96 xl:text-center px-32 py-4">
                {{ __('Create the Recipe') }}
            </x-button>
        </form>
    </div>




</x-app-layout>
