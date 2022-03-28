<?php

namespace App\Repositories\Interfaces;

use App\Models\Project;
use Illuminate\Http\Request;

interface ProjectRepositoryInterface {
    public function store(Request $request);

    public function update(Project $project, Request $request);

    public function delete(Project $project);
}