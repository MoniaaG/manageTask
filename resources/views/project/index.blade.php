@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <ul class="list-group">
                <li class="list-group-item disabled">Cras justo odio</li>
                @foreach($projects as $project)
                    <a href="{{route('task.project', ['project' => $project])}}" class="list-group-item list-group-item-action">
                        <h4>{{$project->title}}</h4>
                        <p>{{$project->description}}</p>
                    </a>
                @endforeach
              </ul>
        </div>
    </div>
@endsection

