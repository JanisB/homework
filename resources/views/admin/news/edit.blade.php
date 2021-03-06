@extends('layouts.admin')
@section('title') Edit news - @parent @stop
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit news</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Editing area</li>
        </ol>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <div>
            <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }} " enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="from-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category_id" id="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($news->category_id === $category->id) selected @endif>
                                {{ $category->title }}
                            </option> 
                        @endforeach
                    </select>
                </div><br>
                <div class="from-group">
                    <label for="title">Heading</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
                </div><br>
                <div class="from-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div><br>
                <div class="from-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option @if ($news->status === 'DRAFT') selected @endif>DRAFT</option>
                        <option @if ($news->status === 'PUBLISHED') selected @endif>PUBLISHED</option>
                        <option @if ($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
                    </select>
                </div><br>
                <div class="from-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description">{!! $news->description !!}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Save</button>
                <br>
            </form>
            <br>
        </div>
    </div>
@endsection
@push('editor')
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush 