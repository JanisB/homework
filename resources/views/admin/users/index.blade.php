@extends('layouts.admin')
@section('title') User list - @parent @stop
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">User</h1>
        
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">User List</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                User List
            </div>
            <div class="card-body">
                @include('inc.message')
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Role</th>
                            <th>Control</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($userList as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->is_admin }}</td>
                            <td><a href="{{ route('admin.users.edit', ['user' => $user]) }}" style="font-size: 12px;">Edit</a> &nbsp; | &nbsp; 
                                <a href="javascript:;" class="delete" rel="{{ $user->id }}" style="font-size: 12px; color:red;">Delet</a>
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
{{--<script src="{{ asset('assets/admin/js/deleteNews.js')}}"></script>--}}
@endpush
@endsection