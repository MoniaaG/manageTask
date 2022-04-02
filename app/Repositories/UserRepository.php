<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface {
    public function store(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->community_id = Auth::user()->community->id;
        $user->save();
        return $user;
    }

    public function update(User $user, Request $request) {
        $user = User::findOrFail($user->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password === $request->confirm_password)
            $user->password = Hash::make($request->password);
        $user->community_id = Auth::user()->community->id;
        $user->save();
        return $user;
    }

    public function delete(User $user) {
        $user = User::findOrFail($user->id);
        $user->delete();
    }
}