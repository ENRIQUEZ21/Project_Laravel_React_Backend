<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{



    public function index($userId) {
        $user = User::where('id', $userId)->first();
        return view('user.index', [
            'user' => $user
        ]);
    }

    public function edit() {
        return view('user.edit');
    }

    public function update(Request $request) {
        $user = Auth::user();
        $user->email = $request->email;
        $user->job = $request->job;
        $user->save();
        return redirect()->route('user', ['userId' => Auth::id()]);
    }

    public function allUsers() {
        if(Auth::user()->isAdmin == true) {
            $users = User::where('id', '!=', Auth::id())->where('isBanned', false)->get();
            return view('user.all', [
                'users' => $users
            ]);
        }
    }

    public function banUser($userId) {
        if(Auth::user()->isAdmin == true) {
            $user = User::where('id', $userId)->first();
            $user->isBanned = true;
            $user->save();
            $users = User::where('id', '!=', Auth::id())->where('isBanned', false)->get();
            return view('user.all', [
                'users' => $users
            ]);
        }
    }

    public function restoreUser($userId) {
        if(Auth::user()->isAdmin == true) {
            $user = User::where('id', $userId)->first();
            $user->isBanned = false;
            $user->save();
            $users = User::where('id', '!=', Auth::id())->where('isBanned', true)->get();
            return view('user.banned', [
                'users' => $users
            ]);
        }
    }

    public function bannedUsers() {
        $users = User::where('isBanned', true)->get();
        return view('user.banned', [
            'users' => $users
        ]);
    }

}
