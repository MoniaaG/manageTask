<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Http\Request;

interface UserRepositoryInterface {
    public function store(Request $request);

    public function update(User $user, Request $request);

    public function delete(User $user);
}