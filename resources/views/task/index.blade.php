@extends('layouts.app')

@section('content')

    <div id="tasks">
        <task-dnd :cards="{{json_encode($tasks)}}" :statuses="{{json_encode($statuses)}}" :priorities="{{json_encode($priorities)}}"></task-dnd>   
    </div>
    
    <script src="{{ asset('/js/task/task_add_update.js') }}"></script>
    <script src="{{ asset('/js/delete/task.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection