<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public $project_repository;

    public function __construct(ProjectRepositoryInterface $project_repository)
    {
        $this->project_repository = $project_repository;
    }

    public function index() {
        $projects = Auth::user()->projects;
        return view('project.index', compact('projects'));
    }

    public function create() {
        $users = Auth::user()->community()->users;
        return view('project.create', compact('users'));
    }

    public function store(Request $request) {
        $this->project_repository->store($request);
        return redirect()->route('project.index');
    }

    public function edit(Project $project) {
        $users = Auth::user()->community()->users;
        return view('project.edit', compact('project', 'users'));
    }

    public function update(Project $project, Request $request) {
        $this->project_repository->update($project, $request);
        return redirect()->route('project.index');
    }

    public function delete(Project $project) {
        $this->project_repository->delete($project);
        return redirect()->route('project.index');
    }
}
