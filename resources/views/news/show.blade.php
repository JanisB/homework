@extends('layouts.main')
@section('content')
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">

        <!-- Post preview-->
        <div class="post-preview">
                <h2 class="post-title">test</h2>
                <h3 class="post-subtitle">test</h3>
            <p class="post-meta">
                Posted by
                <a href="#!">Admin</a>
                on {{ now()->format('d-m-Y H:i') }}
            </p>
        </div>
    </div>
</div>
</div>
@endsection