@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Global News</h2>
        <p class="text-muted mb-0">Latest updates on global risks and events.</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-xl-4 col-lg-4">
        @include('components.news-card')
    </div>
    <div class="col-xl-8 col-lg-8">
        <div class="card dashboard-card h-100 border-0 shadow-sm rounded-4">
            <div class="card-header bg-transparent border-0 pt-4 px-4">
                <h5 class="fw-bold mb-1">Trending Topics</h5>
                <small class="text-muted">Featured analysis and updates</small>
            </div>
            <div class="card-body p-4">
                <div class="row g-4" id="trending-container">
                    <div class="col-12 text-center py-5">
                        <div class="spinner-border text-primary" role="status"></div>
                        <p class="text-muted mt-2 small">Loading trending topics...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const trendingContainer = document.getElementById('trending-container');

    fetch('/api/news?category=trending')
        .then(res => res.json())
        .then(json => {
            if (!json.success || !json.articles || json.articles.length === 0) {
                trendingContainer.innerHTML = `<div class="col-12 text-center py-4"><p class="text-muted">No trending topics available.</p></div>`;
                return;
            }

            trendingContainer.innerHTML = '';

            json.articles.forEach((article, index) => {
                const pubDate = new Date(article.publishedAt);
                const now = new Date();
                const diffHrs = Math.floor((now - pubDate) / (1000 * 60 * 60));
                let timeStr = diffHrs === 0 ? 'Just now' : diffHrs < 24 ? `${diffHrs} hours ago` : `${Math.floor(diffHrs / 24)} days ago`;
                
                const placeholderImg = `https://picsum.photos/seed/${index + 20}/400/200`;
                const imgSrc = article.image || placeholderImg;

                trendingContainer.innerHTML += `
                    <div class="col-md-6">
                        <div class="p-4 border rounded-4 h-100 d-flex flex-column">
                            <a href="${article.url}" target="_blank" class="text-decoration-none">
                                <img src="${imgSrc}" onerror="this.src='${placeholderImg}'" class="img-fluid rounded-3 mb-3 w-100 shadow-sm" alt="News Image" style="object-fit: cover; height: 160px;">
                            </a>
                            <span class="badge bg-danger-subtle text-danger mb-3 align-self-start">Trending</span>
                            <h6 class="fw-bold mb-2">
                                <a href="${article.url}" target="_blank" class="text-decoration-none text-dark hover-primary">${article.title}</a>
                            </h6>
                            <p class="text-muted small mb-3 flex-grow-1" style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;">
                                ${article.description || 'Read more for details on this trending topic.'}
                            </p>
                            <small class="text-muted mt-auto">
                                <i class="fa-regular fa-clock me-1"></i> ${timeStr} 
                                <span class="mx-1">•</span> 
                                ${article.source?.name || 'News'}
                            </small>
                        </div>
                    </div>
                `;
            });
        })
        .catch(err => {
            trendingContainer.innerHTML = `<div class="col-12 text-center py-4"><p class="text-danger"><i class="fa-solid fa-circle-exclamation me-1"></i> Failed to load trending topics.</p></div>`;
        });
});
</script>
@endpush
@endsection
