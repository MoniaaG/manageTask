@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="h2 text-warning text-center">Edit your account</div>
            <form action="{{ route('user.update', ['user' => $user]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3 form-group">
                    <label for="name" class="form-label text-warning h5">Name</label>
                    <input type="text" class="form-control bg-dark text-white border-warning border-2 bg-secondary" id="name" name="name" required value="{{$user->name}}">
                </div>
                <div class="mb-3 form-group">
                    <label for="password" class="form-label text-warning h5">Password</label>
                    <input type="password" class="form-control bg-dark text-white border-warning border-2 bg-secondary" id="password" name="password" required value="{{$user->password}}">
                </div>
                <div class="mb-3 form-group">
                    <label for="confirm_password" class="form-label text-warning h5">Confirm password</label>
                    <input type="password" class="form-control bg-dark text-white border-warning border-2 bg-secondary" id="confirm_password" name="confirm_password" required value="{{$user->password}}">
                </div>
                <button type="submit" class="btn btn-warning col-12 col-md-2 font-weight-bold offset-md-5">Update</button>
            </form>
        </div>
    </div>
@endsection 