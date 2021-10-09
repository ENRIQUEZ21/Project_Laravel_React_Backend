<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Main dishes') }}
        </h2>
    </x-slot>

    <p class="text-3xl text-center py-6"><i class="fa fa-cutlery"></i>Main Dishes</p>
    @if(sizeof($recipes) == 0)
        <p class="text-center">There are no main dishes</p>
    @else
        <table class="w-11/12 m-auto">
            <thead>
            <tr>
                <th>Recipe name</th>
                <th class="w-1/6">Image</th>
                <th>From</th>
                <th class="w-1/4">View</th>
            </tr>
            </thead>
            <tbody>
            @foreach($recipes as $recipe)
                <tr class="text-center">
                    <td><b>{{ $recipe->name }}</b></td>
                    <td><img class="m-auto block w-4/5" src="{{ asset('images/'.$recipe->image) }}"></td>
                    <td>{{ $recipe->region }}</td>
                    <td><p><a class="rounded-lg bg-blue-600 text-white px-2 sm:px-4 sm:py-1" href="{{ route('recipe', ['recipeId' => $recipe->id]) }}"><i class="fa fa-eye"></i>View</a></p></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif



</x-app-layout>

