@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <ul class="list-group">
                @foreach($users as $user)
                <li class="list-group-item d-flex justify-content-between align-items-center bg-secondary text-warning">
                <p class="col-12 col-md-8 text-warning">
                    <p>{{$user->name}}</p>
                </p>
                <div class="col-12 col-md-2">
                    <button class="btn btn-danger" data-delete-href="{{route('user.delete', ['user' => $user])}}">Delete</button>
                  </div>
                </li>
                @endforeach
              </ul>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('/js/delete/user.js') }}"></script>
@endsection

