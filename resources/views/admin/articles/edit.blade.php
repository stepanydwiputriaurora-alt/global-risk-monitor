@extends('layouts.admin')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.articles.index') }}" class="text-decoration-none text-muted">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-transparent border-0 pt-4 px-4">
        <h5 class="fw-bold mb-0">Edit Artikel</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label fw-semibold">Judul Artikel</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $article->title) }}" required>
                @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Konten</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="8" required>{{ old('content', $article->content) }}</textarea>
                @error('content') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Penulis</label>
                    <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author', $article->author) }}">
                    @error('author') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="draft" {{ old('status', $article->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $article->status) == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Gambar</label>
                @if($article->image)
                    <div class="mb-2">
                        @if(Str::startsWith($article->image, 'http'))
                            <img src="{{ $article->image }}" alt="image" width="150" class="rounded border">
                        @else
                            <img src="{{ asset('storage/' . $article->image) }}" alt="image" width="150" class="rounded border">
                        @endif
                    </div>
                @endif
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                @error('image') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4">Update Artikel</button>
            </div>
        </form>
    </div>
</div>
@endsection
