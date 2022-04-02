@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <ul class="list-group">
                <li class="list-group-item disabled">Projects</li>
                @foreach($projects as $project)
                    <a href="{{route('task.index', ['project' => $project])}}" class="list-group-item list-group-item-action">
                        <h4>{{$project->title}}</h4>
                        <p>{{$project->description}}</p>
                        <a href="{{route('project.edit', ['project' => $project])}}">Edit</a>
                    </a>
                @endforeach
              </ul>
        </div>
    </div>
@endsection

