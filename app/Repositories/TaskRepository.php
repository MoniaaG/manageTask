<?php

namespace App\Repositories;

use App\Models\Task;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskRepository implements TaskRepositoryInterface {
    public function store(Request $request) {
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description ?? null;
        $task->creator_id = Auth::id();
        $task->project_id = $request->project_id;
        $task->priority = $request->priority;
        $task->status = $request->status;
        $task->save();
        return $task;
    }

    public function update(Request $request) {
        $task = Task::findOrFail($request->task_id);
        $task->title = $request->title;
        $task->description = $request->description ?? null;
        $task->creator_id = Auth::id();
        $task->project_id = $request->project_id ?? 1;
        $task->priority = $request->priority;
        $task->save();
        return $task;
    }

    public function delete(Request $request) {
        $task = Task::findOrFail($request->id);
        $task->delete();
    }
}