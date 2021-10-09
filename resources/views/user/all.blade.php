<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fa fa-key"></i>{{ __('All users') }}
        </h2>
    </x-slot>
    <p class="text-center text-3xl py-12"><i class="fa fa-user"></i>Users</p>
    @if(sizeof($users) == 0)
        <p class="text-center">There are no users not banned in the website</p>
    @else
        <table class="sm:w-4/5 w-11/12 m-auto">
            <thead>
            <tr>
                <th>User</th>
                <th class="sm:w-1/5">View</th>
                <th>Recipes</th>
                <th class="sm:w-1/5">Ban him</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="text-center">
                    <td><b>{{ $user->firstName }} {{ $user->lastName }}</b></td>
                    <td class="text-2xl"><p><a class="rounded-lg bg-blue-600 text-white px-2" href="{{ route('user', ['userId' => $user->id]) }}"><i class="fa fa-eye"></i></a></p></td>
                    <td class="text-2xl"><p><a class="rounded-lg bg-yellow-600 text-white px-2" href="{{ route('allRecipes', ['userId' => $user->id]) }}"><i class="fa fa-cutlery"></i></a></p></td>
                    <td class="text-2xl"><p><a class="rounded-lg bg-red-600 text-white px-2" href="{{ route('banUser', ['userId' => $user->id]) }}"><i class="fa fa-trash"></i></a></p></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    <p class="text-center py-16"><a class="rounded-lg bg-red-600 text-white px-4 py-2" href="{{ route('bannedUsers') }}">Banned users</a></p>
</x-app-layout>
