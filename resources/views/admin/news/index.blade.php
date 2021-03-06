@extends('layouts.admin')
@section('title') News list - @parent @stop
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">News</h1>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary" style="float: right;">Add news</a>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">News List</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                News List
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
                    @forelse($newsList as $news)
                        <tr>
                            <td>{{ $news->id }}</td>
                            <td>{{ $news->title }}</td>
                            <td>{{ $news->description }}</td>
                            <td>{{ $news->created_at }}</td>
                            <td><a href="{{ route('admin.news.edit', ['news' => $news]) }}" style="font-size: 12px;">Edit</a> &nbsp; | &nbsp; 
                                <a href="javascript:;" class="delete" rel="{{ $news->id }}" style="font-size: 12px; color:red;">Delet</a>
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
@push('DeleteNews')
<script src="{{ asset('assets/admin/js/deleteNews.js')}}"></script>
@endpush
@endsection

