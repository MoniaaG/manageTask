<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Statements\Priority;
use App\Statements\Status;
use Illuminate\Http\Request;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public $task_repository;

    public function __construct(TaskRepositoryInterface $task_repository)
    {
        $this->task_repository = $task_repository;
    }

    public function index(Project $project) {
        $this->authorize('index', $project);

        $tasks = $project->tasks;
        $statuses = Status::status();
        $priorities = Priority::priority();
        $users = $project->users;
        return view('task.index', compact('tasks', 'statuses', 'priorities', 'project', 'users'));
    }

    public function show(Request $request) {
        $task = Task::findOrFail($request->id);
        $this->authorize('show', $task);
        $users = $task->users()->pluck('users.id');
        return response()->json(['task' => $task, 'users' => $users]);
    }

    public function store(Request $request) {
        $task = $this->task_repository->store($request);
    }

    public function update(UpdateRequest $request) {
        $this->task_repository->update($request);
    }

    public function delete(Request $request) {
        $this->task_repository->delete($request);
    }

    public function updateOrder(Request $request) {
        $task = Task::findOrFail($request->id);
        $task->update(['status' => $request->status]);
    }

    public function getTasks() {
        $tasks = Task::where('creator_id', Auth::id())->get();
        $statuses = Status::status();
        $priorities = Priority::priority();
        return response()->json(['tasks' => $tasks, 'statuses' => $statuses, 'priorities' => $priorities]);
    }
}
