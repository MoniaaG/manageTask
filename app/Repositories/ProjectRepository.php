<?php

namespace App\Repositories;

use App\Models\Project;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectRepository implements ProjectRepositoryInterface {
    public function store(Request $request) {
        $project = new Project();
        $project->title = $request->title;
        $project->description =  $request->description ?? null;
        $project->creator_id = Auth::id();
        $project->save();
        return $project;
    }

    public function update(Request $request, Project $project) {
        $project = Project::findOrFail($project->id);
        $project->title = $request->title;
        $project->description =  $request->description ?? null;
        $project->save();
        return $project;
    }

    public function delete(Project $project) {
        $project = Project::findOrFail($project->id);
        $project->delete();
    }
}