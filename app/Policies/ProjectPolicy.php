<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
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
        return $user->community_id === $project->community_id || $project->users->contains('id', $user->id);
    }

    public function update(User $user, Project $project) {
        return $user->id === $project->creator_id;
    }

    public function delete(User $user, Project $project) {
        return $user->id === $project->creator_id;
    }
}

