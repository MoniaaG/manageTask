<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $user_repository;

    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function index() {
        $users = Auth::user()->community->users()->get();
        return view('user.index', compact('users'));
    }

    public function create() {
        return view('user.create');
    }

    public function store(Request $request) {
        $this->user_repository->store($request);
        return redirect()->route('user.index');
    }

    public function edit(User $user) {
        return view('user.edit', compact('user'));
    }

    public function update(User $user, UserUpdateRequest $request) {
        $this->user_repository->update($user, $request);
        return redirect()->route('project.index');
    }

    public function delete(User $user) {
        $this->user_repository->delete($user);
    }
}
