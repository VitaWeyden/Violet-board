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

    <div class="d-flex flex-column">
        <div class="sidebar-title">Categories</div>
        <hr class="sidebar-title-divider">

        <a href="{{ url('/shop') }}" class="category-button {{ request()->is('shop') && !request()->segment(2) ? 'active' : '' }}">All Games</a>
        <hr style="border-color: rgba(255,255,255,0.4); margin: 6px 0; border-width: 2px; opacity: 1;">

        @php
            $sidebarCategories = [
                'strategy-games'  => 'Strategy Games',
                'card-games'      => 'Card Games',
                'party-games'     => 'Party Games',
                'family-games'    => 'Family Games',
                'childrens-games' => "Children's Games",
                'memory-games'    => 'Memory Games',
            ];
        @endphp

        @foreach ($sidebarCategories as $slug => $label)
            <a
                href="{{ url('/shop/' . $slug) }}"
                class="category-button {{ request()->is('shop/' . $slug) ? 'active' : '' }}"
            >{{ $label }}</a>
        @endforeach
    </div>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('appSidebar');
        const w = sidebar.scrollWidth;
        sidebar.style.width = w + 'px';
        document.documentElement.style.setProperty('--sidebar-w', w + 'px');
        const toggle = document.getElementById('sidebarToggle');
        if (toggle) toggle.style.left = w + 'px';
    });
</script>
