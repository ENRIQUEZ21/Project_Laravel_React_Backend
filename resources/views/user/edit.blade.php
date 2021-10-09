<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update your profile') }}
        </h2>
    </x-slot>

    <p class="text-center text-3xl py-8"><i class="fa fa-user"></i>{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</p>
    <form method="POST" action="{{ route('updateUser') }}" class="text-center">
        @csrf
        <div class="py-6 text-center">
            <x-label for="email" :value="__('Email')" />

            <input id="email" class="block mt-1 sm:w-96 m-auto rounded-lg" type="email" name="email" value="{{ Auth::user()->email }}" required autofocus />
        </div>

        <div class="py-6 text-center">
            <x-label for="job" :value="__('Job')" />

            <input id="job" class="block mt-1 sm:w-96 m-auto rounded-lg" type="text" name="job" value="{{ Auth::user()->job }}" required autofocus />
        </div>
            <x-button class="px-6 py-3">
                {{ __('Update') }}
            </x-button>

    </form>
</x-app-layout>
