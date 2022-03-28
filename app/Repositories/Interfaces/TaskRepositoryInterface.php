<?php

namespace App\Repositories\Interfaces;

use App\Models\Task;
use Illuminate\Http\Request;

interface TaskRepositoryInterface {
    public function store(Request $request);

    public function update(Task $task, Request $request);

    public function delete(Task $task);
}