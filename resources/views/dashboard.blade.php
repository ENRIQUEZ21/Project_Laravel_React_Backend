<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if(\Illuminate\Support\Facades\Auth::user()->is_banned != true)
        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex-row sm:flex">
                <div class="sm:w-2/4 bg-blue-100 overflow-hidden shadow-sm rounded-lg max-h-80">
                    <div class="p-6 border-b border-gray-200">
                        <p class="text-2xl"><a href="{{ route('makeAdmin') }}">ADMIN</a></p>
                        <p class="text-2xl"> <i class="fa fa-user"></i> My personal informations</p>
                        <p class="mt-4"><b>First name:</b> {{ Auth::user()->first_name }}</p>
                        <p><b>Last name:</b> {{ Auth::user()->last_name }}</p>
                        <p><b>Email: </b>{{ Auth::user()->email }}</p>
                        <p><b>Birth date:</b> {{ Auth::user()->birthdate }}</p>
                        <p><b>Job:</b> {{ Auth::user()->job }}</p>
                        <p class="text-center py-12">
                            <a class="bg-blue-600 text-white px-6 py-4 rounded-lg" href="{{ route('user', ['userId' => Auth::user()->id]) }}">
                                <i class="fa fa-eye"></i> View
                            </a>
                            <a class="bg-green-600 text-white px-6 py-4 rounded-lg ml-4" href="{{ route('editUser') }}">
                                <i class="fa fa-pencil"></i> Update
                            </a></p>
                    </div>
                </div>
                <div class="sm:w-2/4 bg-red-100 overflow-y-scroll shadow-sm rounded-lg ml-4 max-h-80">
                    <div class="p-6 border-b border-gray-200">
                        <p class="text-2xl"><i class="fa fa-cutlery"></i> My recipes</p>
                        @if(sizeof($recipes) == 0)
                            <p>You haven't recipes in your account</p>
                        @else
                            <table class="w-full">
                                <thead>
                                <tr>
                                    <th>Recipe name</th>
                                    <th>From</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($recipes as $recipe)
                                    <tr class="text-center">
                                        <td><b>{{ $recipe->name }}</b></td>
                                        <td>{{ $recipe->region }}</td>
                                        <td>{{ $recipe->created_at }}</td>
                                        <td class="w-1/5 "><p><a class="rounded-lg bg-blue-600 text-white px-3" href="{{ route('recipe', ['recipeId' => $recipe->id]) }}"><i class="fa fa-eye"></i></a></p></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                        <p class="py-12 text-center mb-0"><a class="bg-black text-white px-6 py-4 rounded-lg ml-4 m-auto" href="{{ route('allRecipes', ['userId' => Auth::user()->id]) }}">
                                <i class="fa fa-cutlery"></i> My recipes
                            </a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex-row sm:flex">
                <div class="sm:w-2/4 bg-yellow-100 overflow-x-scroll shadow-sm rounded-lg max-h-72 mt-4">
                    <div class="p-6 border-b border-gray-200">
                        <p class="text-2xl"> <i class="fa fa-globe"></i> All recipes by origins</p>
                        <div class="sm:flex sm:flex-row">
                            @foreach($regions as $region)
                                <p class="text-center bg-blue-100 rounded-lg py-2 px-4 mt-4 ml-4 mr-4">
                                    <a href="{{ route('byRegionRecipes', ['region' => $region]) }}">
                                        <b class="py-3 w-2/5 text-center">{{ $region }} </b>
                                        <img class="m-auto w-96" src="{{ asset('images/'.$region.'.png') }}">
                                    </a>
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="sm:w-2/4 bg-green-100 shadow-sm overflow-x-scroll overflow-y-scroll rounded-lg ml-4 max-h-72 mt-4">
                    <div class="p-6 border-b border-gray-200">
                        <p class="text-2xl"> <i class="fa fa-trophy"></i> Best recipes</p>
                        <table class="w-full mt-4">
                            <thead>
                            <tr>
                                <th>Recipe name</th>
                                <th>Created at</th>
                                <th>Note</th>
                                <th>Number of notations</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bestRecipes as $recipe)
                                <tr class="text-center">
                                    <td><a href="{{ route('recipe', ['recipeId' => $recipe->id]) }}">{{ $recipe->name }}</a></td>
                                    <td>{{ $recipe->created_at }}</td>
                                    <td>{{ $recipe->notation }} / 10</td>
                                    <td>{{ $recipe->number_notations }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex-row sm:flex">
                <div class="sm:w-2/4 bg-purple-100 overflow-x-scroll overflow-y-scroll max-h-72  shadow-sm rounded-lg mt-4">
                    <div class="p-6 border-b border-gray-200">
                        <p class="text-2xl"><i class="fa fa-clock-o"></i> Latest recipes</p>
                        <table class="w-full mt-4">
                            <thead>
                            <tr>
                                <th>Recipe name</th>
                                <th>Created at</th>
                                <th>Note</th>
                                <th>Number of notations</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($latestRecipes as $recipe)
                                <tr class="text-center">
                                    <td><a href="{{ route('recipe', ['recipeId' => $recipe->id]) }}">{{ $recipe->name }}</a></td>
                                    <td>{{ $recipe->created_at }}</td>
                                    <td>{{ $recipe->notation }} / 10</td>
                                    <td>{{ $recipe->number_notations }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="sm:w-2/4 bg-blue-100 overflow-x-scroll overflow-y-scroll max-h-72  shadow-sm rounded-lg ml-4 mt-4">
                    <div class="p-6 border-b border-gray-200">
                        <p class="text-2xl"><i class="fa fa-fast-forward"></i> Quickest recipes</p>
                        <table class="w-full mt-4">
                            <thead>
                            <tr>
                                <th>Recipe name</th>
                                <th>Created at</th>
                                <th>Duration</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quickestRecipes as $recipe)
                                <tr class="text-center">
                                    <td><a href="{{ route('recipe', ['recipeId' => $recipe->id]) }}">{{ $recipe->name }}</a></td>
                                    <td>{{ $recipe->created_at }}</td>
                                    <td>{{ $recipe->duration }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="py-12">
        <p class="text-center text-2xl">You have been banned from the website</p>
    </div>
    @endif
</x-app-layout>
