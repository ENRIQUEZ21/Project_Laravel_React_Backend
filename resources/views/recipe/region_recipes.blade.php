<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recipes by region') }}
        </h2>
    </x-slot>
    <p class="text-3xl py-12 text-center"><i class="fa fa-map"></i>{{ $region }}</p>
    <img src="{{ asset('images/'.$region.'.png') }}" class="py-6 m-auto w-2/5">
    @if(sizeof($recipes) == 0)
        <p class="text-center 2-xl py-12">There are not recipes for the region {{ $region }}</p>
    @else
        <div class="py-12">
            <table class="w-11/12 m-auto">
                <thead>
                <tr>
                    <th>Recipe name</th>
                    <th class="w-1/6">Image</th>
                    <th class="w-1/4">Created at</th>
                    <th class="w-1/4">View</th>
                </tr>
                </thead>
                <tbody>
                @foreach($recipes as $recipe)
                    <tr class="text-center">
                        <td><b>{{ $recipe->name }}</b></td>
                        <td><img class="m-auto block w-4/5" src="{{ asset('images/'.$recipe->image) }}"></td>
                        <td>{{ $recipe->created_at }}</td>
                        <td><p><a class="rounded-lg bg-blue-600 text-white px-2 py-1 sm:px-12 sm:py-4" href="{{ route('recipe', ['recipeId' => $recipe->id]) }}"><i class="fa fa-eye"></i>View</a></p></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</x-app-layout>
