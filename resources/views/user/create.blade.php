@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="h2 text-warning text-center">Add new user to your community</div>
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="mb-3 form-group">
                    <label for="name" class="form-label text-warning h5">Name</label>
                    <input type="text" class="form-control bg-dark text-white border-warning border-2 bg-secondary" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-warning h5">Email</label>
                    <input type="email" class="form-control bg-dark text-white border-warning border-2 bg-secondary" id="email" name="email" required>
                </div>
                <button type="submit" class="btn btn-warning col-12 col-md-2 font-weight-bold offset-md-5">Add</button>
            </form>
        </div>
    </div>
@endsection 