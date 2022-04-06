<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(User $user, Project $project) {
        return $user->community_id === $project->community_id;
    }

    public function show(User $user, Task $task) {
        return $user->id === $task->creator_id || $user->id === Project::find($task->project_id)->users();
    }
}
