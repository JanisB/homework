@extends('layouts.admin')
@section('title') Edit user - @parent @stop
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit user</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Editing area</li>
        </ol>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <div>
            <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
                @csrf
                @method('put')
                <div class="from-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                </div><br>
                <div class="from-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div><br>
                <div class="from-group">
                    <label for="is_admin">Role</label>
                    <select class="form-control" name="is_admin" id="is_admin">
                        <option @if ($user->is_admin === '1') selected @endif>1</option>
                        <option @if ($user->is_admin === '0') selected @endif>0</option>
                    </select>
                </div><br>
                <button type="submit" class="btn btn-primary">Save</button>
                <br>
            </form>
            <br>
        </div>
    </div>
@endsection