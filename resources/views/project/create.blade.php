@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="h2 text-warning text-center">Add new project</div>
            <form action="{{ route('project.store') }}" method="POST">
                @csrf
                <div class="mb-3 form-group">
                    <label for="title" class="form-label text-warning h5">Title</label>
                    <input type="text" class="form-control bg-dark text-white border-warning border-2 bg-secondary" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label text-warning h5">Description</label>
                    <textarea class="form-control bg-dark text-white border-warning border-2 bg-secondary" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                <label for="title" class="form-label text-warning h5">Assign users to project which can have access to see task inside</label>
                <select id="users" class="form-control bg-dark text-white border-warning border-2 bg-secondary m-0" name="users[]" multiple="multiple">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" class="btn btn-warning col-12 col-md-2 font-weight-bold offset-md-5">Save</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#users').select2();
    });
</script>
@endsection 