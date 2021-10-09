<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <p class="text-3xl text-center py-12"><i class="fa fa-user"></i>Profile</p>
    <div class="text-center flex-row sm:flex">
        <div class="sm:w-2/4 bg-yellow-100 rounded-lg ml-4 mr-4">
            <p class="py-6 text-xl"><b>First name: </b>{{ $user->firstName }}</p>
            <p class="py-6 text-xl"><b>Last name: </b>{{ $user->lastName }}</p>
            <p class="py-6 text-xl"><b>Email: </b>{{ $user->email }}</p>
        </div>
        <div class="sm:w-2/4 ml-4 mr-4 bg-yellow-100 rounded-lg">
            <p class="py-6 text-xl"><b>Birthdate: </b>{{ $user->birthdate }}</p>
            <p class="py-6 text-xl"><b>Job: </b>{{ $user->job }}</p>
            <p class="py-6 text-xl"><b>Creation of the account: </b>{{ $user->created_at }}</p>
        </div>
    </div>
    @if(\Illuminate\Support\Facades\Auth::id() == $user->id)
        <p class="text-center py-12"><a class="rounded-lg bg-green-600 text-white py-4 px-12 m-auto" href="{{ route('editUser') }}"><i class="fa fa-pencil"></i>Update</a></p>
    @endif

</x-app-layout>
