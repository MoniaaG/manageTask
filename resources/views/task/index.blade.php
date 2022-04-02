@extends('layouts.app')

@section('content')
    <div id="tasks">
        <div class="container d-flex">
            @foreach($statuses as $status)
            <div class="task-list" data-project={{$project->id}}>
                <h5><b>{{$status}}</b></h5>
            <div class="drop-zone" data-status="{{$status}}">
                @foreach ($tasks as $task)
                    @if($task->status === $status)
                    <div class="drag-el bg-warning text-dark text-opacity-75 draggable" type="button" data-toggle="modal" data-target="#exampleModalCenter" draggable="true" data-task="{{$task->id}}" data-status="{{$status}}">
                        {{$task->title}}
                    </div>
                    @endif
                @endforeach
            </div>
                <button class="btn btn-dark text-warning col-12 mt-2 border-radius show-add-task" data-status="{{$status}}">+ Add task</button>
            </div>  
            @endforeach
    </div>
    @include('modals.create_task')
    @include('modals.show_task')
@endsection

@section('js')
    <script src="{{ asset('/js/task_dnd.js') }}" defer></script>
    <script src="{{ asset('/js/task/task_add_update.js') }}"></script>
    <script src="{{ asset('/js/delete/task.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#users').select2({
                width: '100%',
                dropdownParent: $("#modalCreateTask"),
                multiple: true,
            });

            $('#select-users').select2({
                width: '100%',
                dropdownParent: $("#exampleModalCenter"),
                multiple: true,
            });
        });
    </script>
@endsection