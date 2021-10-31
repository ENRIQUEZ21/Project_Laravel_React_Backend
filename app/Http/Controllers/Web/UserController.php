<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /*public function makeAdmin() {
        $user = Auth::user();
        $user->is_admin = true;
        $user->save();
        return redirect()->route('user', ['userId' => Auth::id()]);
    }*/



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
        if(Auth::user()->is_admin == true) {
            $users = User::where('id', '!=', Auth::id())->where('is_banned', false)->get();
            return view('user.all', [
                'users' => $users
            ]);
        }
    }

    public function banUser($userId) {
        if(Auth::user()->is_admin == true) {
            $user = User::where('id', $userId)->first();
            $user->is_banned = true;
            $user->save();
            $users = User::where('id', '!=', Auth::id())->where('is_banned', false)->get();
            return view('user.all', [
                'users' => $users
            ]);
        }
    }

    public function restoreUser($userId) {
        if(Auth::user()->is_admin == true) {
            $user = User::where('id', $userId)->first();
            $user->is_banned = false;
            $user->save();
            $users = User::where('id', '!=', Auth::id())->where('is_banned', true)->get();
            return view('user.banned', [
                'users' => $users
            ]);
        }
    }

    public function bannedUsers() {
        $users = User::where('is_banned', true)->get();
        return view('user.banned', [
            'users' => $users
        ]);
    }

}
