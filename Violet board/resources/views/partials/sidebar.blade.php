<button
    type="button"
    data-drawer-target="appSidebar"
    data-drawer-toggle="appSidebar"
    aria-controls="appSidebar"
    class="sidebar-mobile-toggle"
    aria-label="Open categories"
>
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h10"/>
    </svg>
</button>

<button class="sidebar-toggle" id="sidebarToggle" title="Toggle categories">&#9664;</button>

<aside
    id="appSidebar"
    class="sidebar transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Product categories"
>
    <button
        type="button"
        data-drawer-hide="appSidebar"
        aria-controls="appSidebar"
        class="sidebar-close-btn"
        aria-label="Close"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 18 18 6M6 6l12 12"/>
        </svg>
    </button>

    <div class="sidebar-inner">

        {{-- Brand --}}
        <a href="{{ url('/') }}" class="sidebar-logo">
            <span class="sidebar-logo-mark">
                {{-- die / board-game mark --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                    <rect x="3.5" y="3.5" width="17" height="17" rx="4" stroke="currentColor" stroke-width="2"/>
                    <circle cx="8.6" cy="8.6" r="1.4" fill="currentColor"/>
                    <circle cx="15.4" cy="8.6" r="1.4" fill="currentColor"/>
                    <circle cx="12" cy="12" r="1.4" fill="currentColor"/>
                    <circle cx="8.6" cy="15.4" r="1.4" fill="currentColor"/>
                    <circle cx="15.4" cy="15.4" r="1.4" fill="currentColor"/>
                </svg>
            </span>
            <span class="sidebar-logo-name">Violet<span>Board</span></span>
        </a>

        {{-- Shop navigation --}}
        <nav class="d-flex flex-column">
            <div class="sidebar-title">Shop</div>

            <a href="{{ url('/shop') }}" class="category-button {{ request()->is('shop') && !request()->segment(2) ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                    <rect x="4" y="4" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.8"/>
                    <rect x="13" y="4" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.8"/>
                    <rect x="4" y="13" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.8"/>
                    <rect x="13" y="13" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.8"/>
                </svg>
                All Games
            </a>

            @php
                $categoryData = include resource_path('views/partials/category-data.php');
                $sidebarCategories = $categoryData['categories'];
                $sidebarIcons = $categoryData['icons'];
            @endphp

            @foreach ($sidebarCategories as $slug => $label)
                <a
                    href="{{ url('/shop/' . $slug) }}"
                    class="category-button {{ request()->is('shop/' . $slug) ? 'active' : '' }}"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">{!! $sidebarIcons[$slug] !!}</svg>
                    {{ $label }}
                </a>
            @endforeach
        </nav>

        {{-- Support — pinned to the bottom of the sidebar --}}
        <nav class="sidebar-support">
            <div class="sidebar-title">Support</div>

            <button type="button" class="category-button" data-modal-target="helpModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/>
                    <path stroke="currentColor" stroke-width="1.8" stroke-linecap="round" d="M9.5 9.2a2.5 2.5 0 1 1 3.5 2.3c-.8.4-1 .9-1 1.6"/>
                    <circle cx="12" cy="16.3" r="1" fill="currentColor"/>
                </svg>
                Help
            </button>

            <button type="button" class="category-button" data-modal-target="infoModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/>
                    <path stroke="currentColor" stroke-width="1.8" stroke-linecap="round" d="M12 11v5"/>
                    <circle cx="12" cy="8" r="1" fill="currentColor"/>
                </svg>
                Info
            </button>
        </nav>

    </div>
</aside>

{{-- Help popup --}}
<div id="helpModal" class="help-modal" role="dialog" aria-modal="true" aria-labelledby="helpModalTitle">
    <div class="help-modal-backdrop" data-help-close></div>
    <div class="help-modal-card">
        <div class="help-modal-header">
            <h2 id="helpModalTitle" class="help-modal-title">Help</h2>
            <button type="button" class="help-modal-close" data-help-close aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 18 18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="help-modal-body">
            <div class="help-search-wrap">
                <span class="search-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none">
                        <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/>
                        <path stroke="currentColor" stroke-width="2" stroke-linecap="round" d="m20 20-3.2-3.2"/>
                    </svg>
                </span>
                <input type="text" class="help-search-input" placeholder="Search help articles...">
            </div>

            <div class="help-section-label">Get in Touch</div>
            <div class="help-contact">
                <div class="help-contact-row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                        <path stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" d="M4 5c0-.6.4-1 1-1h3l2 5-2 1.5a11 11 0 0 0 5.5 5.5L15 14l5 2v3c0 .6-.4 1-1 1C10.4 20 4 13.6 4 5z"/>
                    </svg>
                    <span>+421 123 123 123</span>
                </div>
                <div class="help-contact-row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                        <rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.8"/>
                        <path stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" d="m4 7 8 6 8-6"/>
                    </svg>
                    <a href="mailto:violetboard@gmail.com">violetboard@gmail.com</a>
                </div>
            </div>

            <div class="help-modal-footer-links">
                <span class="help-modal-footer-link help-modal-footer-link--inert" aria-disabled="true">Send Feedback</span>
            </div>
        </div>
    </div>
</div>

{{-- Info popup --}}
<div id="infoModal" class="help-modal" role="dialog" aria-modal="true" aria-labelledby="infoModalTitle">
    <div class="help-modal-backdrop" data-help-close></div>
    <div class="help-modal-card">
        <div class="help-modal-header">
            <h2 id="infoModalTitle" class="help-modal-title">Info</h2>
            <button type="button" class="help-modal-close" data-help-close aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 18 18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="help-modal-body">
            <div class="help-section-label">Customer Service</div>
            <div class="help-links">
                <a href="#" class="help-link-item">
                    <span class="help-link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <rect x="5" y="3" width="14" height="18" rx="2" stroke="currentColor" stroke-width="1.8"/>
                            <path stroke="currentColor" stroke-width="1.8" stroke-linecap="round" d="M8.5 8h7M8.5 12h7M8.5 16h4"/>
                        </svg>
                    </span>
                    Track Your Order
                </a>
                <a href="#" class="help-link-item">
                    <span class="help-link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <rect x="5" y="3" width="14" height="18" rx="2" stroke="currentColor" stroke-width="1.8"/>
                            <path stroke="currentColor" stroke-width="1.8" stroke-linecap="round" d="M8.5 8h7M8.5 12h7M8.5 16h4"/>
                        </svg>
                    </span>
                    Shipping &amp; Delivery
                </a>
                <a href="#" class="help-link-item">
                    <span class="help-link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <rect x="5" y="3" width="14" height="18" rx="2" stroke="currentColor" stroke-width="1.8"/>
                            <path stroke="currentColor" stroke-width="1.8" stroke-linecap="round" d="M8.5 8h7M8.5 12h7M8.5 16h4"/>
                        </svg>
                    </span>
                    Returns &amp; Refunds
                </a>
                <a href="#" class="help-link-item">
                    <span class="help-link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <rect x="5" y="3" width="14" height="18" rx="2" stroke="currentColor" stroke-width="1.8"/>
                            <path stroke="currentColor" stroke-width="1.8" stroke-linecap="round" d="M8.5 8h7M8.5 12h7M8.5 16h4"/>
                        </svg>
                    </span>
                    FAQ
                </a>
            </div>

            <div class="help-section-label">Company &amp; Legal</div>
            <div class="help-links">
                <a href="#" class="help-link-item">
                    <span class="help-link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <rect x="5" y="3" width="14" height="18" rx="2" stroke="currentColor" stroke-width="1.8"/>
                            <path stroke="currentColor" stroke-width="1.8" stroke-linecap="round" d="M8.5 8h7M8.5 12h7M8.5 16h4"/>
                        </svg>
                    </span>
                    About VioletBoard
                </a>
                <a href="#" class="help-link-item">
                    <span class="help-link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <rect x="5" y="3" width="14" height="18" rx="2" stroke="currentColor" stroke-width="1.8"/>
                            <path stroke="currentColor" stroke-width="1.8" stroke-linecap="round" d="M8.5 8h7M8.5 12h7M8.5 16h4"/>
                        </svg>
                    </span>
                    Terms &amp; Conditions
                </a>
                <a href="#" class="help-link-item">
                    <span class="help-link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <rect x="5" y="3" width="14" height="18" rx="2" stroke="currentColor" stroke-width="1.8"/>
                            <path stroke="currentColor" stroke-width="1.8" stroke-linecap="round" d="M8.5 8h7M8.5 12h7M8.5 16h4"/>
                        </svg>
                    </span>
                    Privacy Policy
                </a>
                <a href="#" class="help-link-item">
                    <span class="help-link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <rect x="5" y="3" width="14" height="18" rx="2" stroke="currentColor" stroke-width="1.8"/>
                            <path stroke="currentColor" stroke-width="1.8" stroke-linecap="round" d="M8.5 8h7M8.5 12h7M8.5 16h4"/>
                        </svg>
                    </span>
                    Cookie Policy
                </a>
            </div>

            <p class="help-copyright">© 2026 VioletBoard. All rights reserved.</p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Fixed sidebar width — keep the CSS variable in sync for layout offsets.
        document.documentElement.style.setProperty('--sidebar-w', '224px');
        const toggle = document.getElementById('sidebarToggle');
        if (toggle) toggle.style.left = 'var(--sidebar-w)';
    });

    (function () {
        const modals = document.querySelectorAll('.help-modal');
        const triggers = document.querySelectorAll('[data-modal-target]');
        if (!modals.length || !triggers.length) return;

        function openModal(modal) {
            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }
        function closeAllModals() {
            modals.forEach(m => m.classList.remove('show'));
            document.body.style.overflow = '';
        }

        triggers.forEach(btn => {
            btn.addEventListener('click', () => {
                const modal = document.getElementById(btn.dataset.modalTarget);
                if (modal) openModal(modal);
            });
        });

        modals.forEach(modal => {
            modal.querySelectorAll('[data-help-close]').forEach(el => el.addEventListener('click', closeAllModals));
        });

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') closeAllModals();
        });
    })();
</script>
