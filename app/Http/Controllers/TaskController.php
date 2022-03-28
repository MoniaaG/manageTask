<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public $task_repository;

    public function __construct(TaskRepositoryInterface $task_repository)
    {
        $this->task_repository = $task_repository;
    }

    public function index() {
        $tasks = Auth::user()->tasks;
        return view('task.index', compact('tasks'));
    }

    public function create() {
        $users = Auth::user()->community()->users;
        return view('task.create', compact('users'));
    }

    public function store(Request $request) {
        $this->task_repository->store($request);
        return redirect()->route('task.index');
    }

    public function edit(Task $task) {
        $users = Auth::user()->community()->users;
        return view('task.edit', compact('task', 'users'));
    }

    public function update(Task $task, Request $request) {
        $this->task_repository->update($task, $request);
        return redirect()->route('task.index');
    }

    public function delete(Task $task) {
        $this->task_repository->delete($task);
        return redirect()->route('task.index');
    }
}
