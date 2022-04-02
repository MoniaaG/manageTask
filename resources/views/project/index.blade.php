@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <ul class="list-group">
                @foreach($projects as $project)
                <li class="list-group-item d-flex justify-content-between align-items-center bg-secondary text-warning">
                <a class="col-12 col-md-8 text-warning" href="{{route('task.index', ['project' => $project])}}">
                    <h4>{{$project->title}}</h4>
                    <p>{{$project->description}}</p>
                </a>
                <div class="col-12 col-md-2">
                  <span class="badge badge-primary badge-pill bg-success p-2 px-3">{{count($project->tasks)}}</span>
                </div>
                <div class="col-12 col-md-2">
                    <a class="btn btn-warning" href="{{route('project.edit', ['project' => $project])}}">Edit</a>
                    <button class="btn btn-danger" data-delete-href="{{route('project.delete', ['project' => $project])}}">Delete</button>
                  </div>
                </li>
                @endforeach
              </ul>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('/js/delete/project.js') }}"></script>
@endsection

