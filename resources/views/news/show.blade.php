@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('news') }}" class="text-decoration-none"><i class="fa-solid fa-newspaper me-1"></i> News</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($article->title, 50) }}</li>
            </ol>
        </nav>

        {{-- Article Card --}}
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            {{-- Featured Image --}}
            @if($article->image)
                @if(Str::startsWith($article->image, 'http'))
                    <img src="{{ $article->image }}" alt="{{ $article->title }}" class="card-img-top" style="max-height: 400px; object-fit: cover;">
                @else
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="card-img-top" style="max-height: 400px; object-fit: cover;">
                @endif
            @endif

            <div class="card-body p-4 p-md-5">
                {{-- Category Badge --}}
                @if($article->category)
                    <span class="badge bg-primary-subtle text-primary mb-3 px-3 py-2 rounded-pill text-capitalize">
                        <i class="fa-solid fa-tag me-1"></i> {{ $article->category }}
                    </span>
                @endif

                {{-- Title --}}
                <h1 class="fw-bold mb-3" style="font-size: 1.75rem; line-height: 1.3;">{{ $article->title }}</h1>

                {{-- Meta Info --}}
                <div class="d-flex flex-wrap align-items-center gap-3 mb-4 pb-4 border-bottom">
                    <div class="d-flex align-items-center text-muted">
                        <i class="fa-solid fa-user-pen me-2 text-primary"></i>
                        <span class="fw-medium">{{ $article->author ?? 'Admin' }}</span>
                    </div>
                    <div class="d-flex align-items-center text-muted">
                        <i class="fa-regular fa-calendar me-2 text-primary"></i>
                        <span>{{ \Carbon\Carbon::parse($article->created_at)->format('d M Y, H:i') }}</span>
                    </div>
                    @if($article->status === 'draft')
                        <span class="badge bg-warning-subtle text-warning px-3 py-2 rounded-pill">
                            <i class="fa-solid fa-eye-slash me-1"></i> Draft
                        </span>
                    @endif
                </div>

                {{-- Content --}}
                <div class="article-content" style="font-size: 1.05rem; line-height: 1.8; color: #374151;">
                    {!! $article->content !!}
                </div>
            </div>
        </div>

        {{-- Back Button --}}
        <div class="mt-4 mb-5">
            <a href="{{ route('news') }}" class="btn btn-outline-primary rounded-pill px-4">
                <i class="fa-solid fa-arrow-left me-2"></i> Kembali ke Berita
            </a>
        </div>
    </div>
</div>
@endsection
