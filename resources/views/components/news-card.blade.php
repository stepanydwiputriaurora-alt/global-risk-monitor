<div class="card news-card h-100">

    <div class="card-header bg-transparent border-0 py-3">

        <div class="d-flex justify-content-between align-items-center mb-2">

            <h5 class="fw-bold mb-0">
                <i class="fa-solid fa-newspaper text-primary me-2"></i>
                Global News
            </h5>

            <span class="badge bg-success-subtle text-success px-2 py-1" id="news-source-badge">
                <i class="fa-solid fa-circle me-1" style="font-size:.5rem;"></i> Live
            </span>

        </div>

        {{-- Category Tabs --}}
        <div class="d-flex gap-2 flex-wrap">
            <button class="btn btn-sm btn-primary news-tab-btn" data-category="logistics">
                <i class="fa-solid fa-ship me-1"></i> Logistics
            </button>
            <button class="btn btn-sm btn-outline-secondary news-tab-btn" data-category="economy">
                <i class="fa-solid fa-chart-line me-1"></i> Economy
            </button>
            <button class="btn btn-sm btn-outline-secondary news-tab-btn" data-category="geopolitics">
                <i class="fa-solid fa-globe me-1"></i> Geopolitics
            </button>
        </div>

    </div>

    <div class="card-body pt-0 overflow-auto" style="max-height: 520px;" id="news-container">
        <div class="text-center py-5">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="text-muted mt-2 small">Loading news...</p>
        </div>
    </div>

</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const container   = document.getElementById('news-container');
    const tabBtns     = document.querySelectorAll('.news-tab-btn');
    const sourceBadge = document.getElementById('news-source-badge');
    let currentCat    = 'logistics';

    // Tab switching
    tabBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            tabBtns.forEach(b => {
                b.classList.remove('btn-primary');
                b.classList.add('btn-outline-secondary');
            });
            this.classList.add('btn-primary');
            this.classList.remove('btn-outline-secondary');
            currentCat = this.dataset.category;
            loadNews(currentCat);
        });
    });

    function loadNews(category) {
        container.innerHTML = `
            <div class="text-center py-5">
                <div class="spinner-border text-primary" role="status"></div>
                <p class="text-muted mt-2 small">Loading ${category} news...</p>
            </div>`;

        fetch(`/api/news?category=${category}`)
            .then(res => res.json())
            .then(json => {
                if (!json.success || !json.articles || json.articles.length === 0) {
                    container.innerHTML = `<p class="text-muted text-center py-4 small">No news available for this category.</p>`;
                    return;
                }

                // Update source badge
                if (json.source === 'gnews') {
                    sourceBadge.innerHTML = '<i class="fa-solid fa-circle me-1" style="font-size:.5rem;"></i> GNews Live';
                    sourceBadge.className = 'badge bg-success-subtle text-success px-2 py-1';
                } else if (json.source === 'fallback') {
                    sourceBadge.innerHTML = '<i class="fa-solid fa-circle me-1" style="font-size:.5rem;"></i> RSS Feed';
                    sourceBadge.className = 'badge bg-info-subtle text-info px-2 py-1';
                } else {
                    sourceBadge.innerHTML = '<i class="fa-solid fa-circle me-1" style="font-size:.5rem;"></i> Demo';
                    sourceBadge.className = 'badge bg-secondary-subtle text-secondary px-2 py-1';
                }

                container.innerHTML = '';

                json.articles.forEach((article, index) => {
                    const isLast      = index === json.articles.length - 1;
                    const pubDate     = new Date(article.publishedAt);
                    const now         = new Date();
                    const diffHrs     = Math.floor((now - pubDate) / (1000 * 60 * 60));
                    let timeStr       = diffHrs === 0 ? 'Just now'
                                     : diffHrs < 24  ? `${diffHrs}h ago`
                                     : `${Math.floor(diffHrs / 24)}d ago`;

                    const categoryBadgeMap = {
                        logistics:   { cls: 'bg-primary-subtle text-primary',   label: 'Logistics'   },
                        economy:     { cls: 'bg-success-subtle text-success',   label: 'Economy'     },
                        geopolitics: { cls: 'bg-warning-subtle text-warning',   label: 'Geopolitics' },
                    };
                    const badge = categoryBadgeMap[category] || categoryBadgeMap.logistics;

                    const placeholderImg = `https://picsum.photos/seed/${index + 10}/120/80`;
                    const imgSrc         = article.image || placeholderImg;

                    container.innerHTML += `
                        <div class="news-item ${isLast ? 'border-0 pb-0' : ''}">
                            <img src="${imgSrc}"
                                 onerror="this.src='${placeholderImg}'"
                                 alt="News thumbnail"
                                 style="object-fit:cover;width:72px;height:52px;border-radius:8px;flex-shrink:0;">
                            <div class="news-content">
                                <div class="d-flex gap-2 mb-1 flex-wrap">
                                    <span class="badge ${badge.cls}">${badge.label}</span>
                                    <span class="badge bg-light text-muted small">${article.source?.name || 'Source'}</span>
                                </div>
                                <h6 class="mb-1" style="font-size:.85rem;line-height:1.3;">
                                    <a href="${article.url}" target="_blank" rel="noopener"
                                       class="text-decoration-none text-dark">
                                        ${article.title}
                                    </a>
                                </h6>
                                <p class="text-muted small mb-1" style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                                    ${article.description || ''}
                                </p>
                                <small class="text-muted">
                                    <i class="fa-regular fa-clock me-1"></i>${timeStr}
                                </small>
                            </div>
                        </div>`;
                });
            })
            .catch(err => {
                console.error('News fetch error:', err);
                container.innerHTML = `<p class="text-danger text-center py-4 small"><i class="fa-solid fa-circle-exclamation me-1"></i>Failed to load news.</p>`;
            });
    }

    // Initial load
    loadNews('logistics');
});
</script>
@endpush