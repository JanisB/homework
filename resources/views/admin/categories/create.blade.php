@extends('layouts.admin')
@section('title') Add category - @parent @stop
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Adding area</li>
        </ol>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <div>
            <form method="post" action="{{ route('admin.news.store') }}">
                @csrf
                <div class="from-group">
                    <label for="title">Heading</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div><br>
                <div class="from-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option @if (old('status') === 'DRAFT') selected @endif>DRAFT</option>
                        <option @if (old('status') === 'PUBLISHED') selected @endif>PUBLISHED</option>
                        <option @if (old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
                    </select>
                </div><br>
                <div class="from-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Save</button>
                <br>
            </form>
            <br>
        </div>
    </div>
@endsection