@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Artikel Analisis</h2>
        <p class="text-muted mb-0">Manajemen artikel dan publikasi.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus me-1"></i> Tambah Artikel
        </a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Sumber / Status</th>
                        <th>Tanggal Dibuat</th>
                        <th class="pe-4 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $index => $article)
                    <tr>
                        <td class="ps-4">{{ $articles->firstItem() + $index }}</td>
                        <td>
                            @if($article->image)
                                @if(Str::startsWith($article->image, 'http'))
                                    <img src="{{ $article->image }}" alt="image" width="60" class="rounded">
                                @else
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="image" width="60" class="rounded">
                                @endif
                            @else
                                <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        <td>
                            @php
                                if ($article->is_local) {
                                    $articleLink = $article->url ?: ($article->slug ? url("/news/{$article->slug}") : '#');
                                } else {
                                    $articleLink = $article->url ?? '#';
                                }
                            @endphp
                            <a href="{{ $articleLink }}" target="_blank" class="text-decoration-none fw-semibold text-primary" title="{{ $article->title }}">
                                {{ Str::limit($article->title, 40) }}
                                <i class="fa-solid fa-arrow-up-right-from-square ms-1" style="font-size: 0.7em; opacity: 0.6;"></i>
                            </a>
                            @if(!$article->is_local)
                                <span class="badge bg-info-subtle text-info ms-1"><i class="fa-solid fa-rss"></i> Live API</span>
                            @endif
                        </td>
                        <td>{{ $article->author ?? 'Admin' }}</td>
                        <td>
                            @if($article->status == 'published')
                                <span class="badge bg-success-subtle text-success">Published</span>
                            @else
                                <span class="badge bg-warning-subtle text-warning">Draft</span>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}</td>
                        <td class="pe-4 text-end">
                            @if($article->is_local)
                                <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus artikel ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            @else
                                <span class="text-muted small">Read Only (API)</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">Belum ada artikel.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white border-0 py-3">
        {{ $articles->links() }}
    </div>
</div>
@endsection
