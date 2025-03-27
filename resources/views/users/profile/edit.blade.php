@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container w-75">
    <div class="col-8">
        <form action="{{ route('profile.update', ['id' => Auth::user()->id]) }}" method="POST" class="p-1 shadow rounded d-block mx-auto avatar-lg" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <h2 class="m-3">Edit Profile</h2>
            <div class="row m-2">
                <div class="col-4 m-2">
                    @if ($user->avatar)
                    <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="p-1 shadow rounded-circle d-block mx-auto avatar-lg">
                    @else
                        <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-lg"></i>
                    @endif
                </div>
                <div class="col-auto">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="name" name="name" id="name" value="{{ old('name', $user->name)}}" class="form-control">
                </div>
                {{--error--}}
                <div class="m-2">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email)}}" class="form-control">
                </div>
                {{--error--}}
                <div class="m-2">
                    <label for="phone_number" class="form-label fw-bold">Phone number</label>
                    <input type="phone_number" name="phone_number" id="phone_number" value="{{ old('phone_number', $user->phone_number)}}" class="form-control">
                </div>
                {{--error--}}
                <div class="m-2">
                    <label for="image" class="form-label fw-bold">Image</label>
                    <input type="file" name="avatar" id="avatar" class="form-control form-control-sm mt-1">
                    <div class="form-text">
                        Acceptable formats: jpeg, jpg, png, gif only<br>
                        Max file size is 1048kb
                    </div>
                    {{--error--}}
                </div>
                <div class="d-grid gap-2 d-md-block mt-4 m-2 text-center">
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="{{ route('profile.show', Auth::user()->id) }}" class="btn btn-secondary">Back</a>    
                </div>
            </div>

        </form>
    </div>
</div>

    
@endsection