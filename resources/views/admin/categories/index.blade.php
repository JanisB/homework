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
                    @forelse($categoryList as $Category)
                        <tr>
                            <td>{{ $loop->index }}</td>
                            <td>{{ $Category['title'] }}</td>
                            <td>{{ $Category['description'] }}</td>
                            <td>{{ now()->format('d-m-Y H:i') }}</td>
                            <td><a href="{{ route('admin.news.index') }}" style="font-size: 12px;">Edit</a> &nbsp; | &nbsp; 
                                <a href="javascript:;" style="font-size: 12px; color:red;">Delet</a>
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

@endsection