<?php

namespace App\Repositories\Interfaces;

use App\Models\Task;
use Illuminate\Http\Request;

interface TaskRepositoryInterface {
    public function store(Request $request);

    public function update(Request $request);

    public function delete(Request $request);
}