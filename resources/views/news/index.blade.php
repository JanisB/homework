@extends('layouts.main')
@section('content')
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @forelse($newsList as $news)
            <!-- Post preview-->
            <div class="post-preview">
                <a href="{{ route('news.show', ['news' => $news]) }}">
                    <h2 class="post-title">{{ $news->title }}</h2>
                    <h3 class="post-subtitle">{!! $news->description !!}</h3>
                </a>
                <p class="post-meta">
                    <img src="{{ Storage::disk('public')->url($news->imgae) }}" style="width: 130px;">
                    <strong>Category: {{ optional($news->category)->title }}</strong>
                    Posted by
                    <a href="#!">Admin</a>
                    on {{ $news->created_at->format('d-m-Y H:i') }}
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            @empty
                <h2>No News</h2>
            @endforelse
            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4">
                {{ $newsList->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

