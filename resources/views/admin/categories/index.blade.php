@extends('layouts.admin')
@section('title') Category list - @parent @stop
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Categorys</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary" style="float: right;">Add Category</a>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Categorys List</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Categorys List
            </div>
            <div class="card-body">
                @include('inc.message')
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Heading</th>
                            <th>Description</th>
                            <th>Date Added</th>
                            <th>Control</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($categoryList as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }} ({{ optional($category->news)->count() }}) </td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td><a href="{{ route('admin.categories.edit', ['category'=> $category->id]) }}" style="font-size: 12px;">Edit</a> &nbsp; | &nbsp; 
                                <a href="javascript:;" class="delete" rel="{{ $category->id }}" style="font-size: 12px; color:red;">Delet</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No news found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@push('DeleteCategory')
<script src="{{ asset('assets/admin/js/deleteCategory.js')}}"></script>
@endpush
@endsection