<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Banned users') }}
        </h2>
    </x-slot>
    <p class="text-center text-3xl py-12"><i class="fa fa-user"></i>Banned users</p>
    @if(sizeof($users) == 0)
        <p class="text-3xl text-center py-12">There are no banned users in the website</p>
    @else
        <table class="sm:w-4/5 w-11/12 m-auto">
            <thead>
            <tr>
                <th>User</th>
                <th class="sm:w-1/5">View</th>
                <th>Recipes</th>
                <th class="sm:w-1/5">Restore</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="text-center">
                    <td><b>{{ $user->first_name }} {{ $user->last_name }}</b></td>
                    <td class="text-2xl"><p><a class="rounded-lg bg-blue-600 text-white px-2" href="{{ route('user', ['userId' => $user->id]) }}"><i class="fa fa-eye"></i></a></p></td>
                    <td class="text-2xl"><p><a class="rounded-lg bg-yellow-600 text-white px-2" href="{{ route('allRecipes', ['userId' => $user->id]) }}"><i class="fa fa-cutlery"></i></a></p></td>
                    <td class="text-2xl"><p><a class="rounded-lg bg-green-600 text-white px-2" href="{{ route('restoreUser', ['userId' => $user->id]) }}"><i class="fa fa-check"></i></a></p></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</x-app-layout>
