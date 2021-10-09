<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All recipes') }}
        </h2>
    </x-slot>

    <p class="text-center text-3xl py-12"><i class="fa fa-cutlery"></i>All recipes</p>

    <p class="text-center text-2xl py-6"><a href="{{ route('allUsersMealStartersRecipes') }}" class="rounded-lg bg-white py-2 px-6 border-solid"><i class="fa fa-coffee"></i>Entrée</a></p>
    <p class="text-center text-2xl py-6"><a href="{{ route('allUsersMainDishesRecipes') }}" class="rounded-lg bg-white py-2 px-6 border-solid"><i class="fa fa-cutlery"></i>Plat</a></p>
    <p class="text-center text-2xl py-6"><a href="{{ route('allUsersDessertsRecipes') }}" class="rounded-lg bg-white py-2 px-6 border-solid"><i class="fa fa-birthday-cake"></i>Dessert</a></p>
</x-app-layout>
