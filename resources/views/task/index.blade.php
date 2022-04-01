@extends('layouts.app')

@section('vuejs')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')

    <div id="tasks">
        <task-dnd :cards="{{json_encode($tasks)}}" :statuses="{{json_encode($statuses)}}" :priorities="{{json_encode($priorities)}}"
        :route_show="'{{route('task.show')}}'" :route_get="'{{route('task.index')}}'" :route_update="'{{route('task.updateOrder')}}'"
        :project="{{$project->id}}"></task-dnd>   
    </div>
@endsection

@section('js')
    <script src="{{ asset('/js/task/task_add_update.js') }}"></script>
    <script src="{{ asset('/js/delete/task.js') }}"></script>
@endsection