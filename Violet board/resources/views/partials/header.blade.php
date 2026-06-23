<nav class="navbar navbar-light fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-nowrap px-3">

        {{-- Left: home + search --}}
        <div class="d-flex align-items-center gap-2">
            <a href="/" class="navbar-home-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                </svg>
            </a>

            <form action="{{ route('search') }}" method="GET" class="search-form-wrap">
                <input
                    type="text"
                    name="query"
                    id="searchInput"
                    class="search-bar"
                    placeholder="Search for games..."
                    value="{{ request('query') }}"
                    autocomplete="off"
                >
                <button
                    type="button"
                    id="searchClearBtn"
                    class="search-clear-btn"
                    title="Clear search"
                    aria-label="Clear search"
                    style="display: {{ request()->filled('query') ? 'flex' : 'none' }};"
                >
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2.5" d="M6 18 18 6M6 6l12 12"/>
                    </svg>
                </button>
                <div id="searchSuggestions" class="search-suggestions"></div>
            </form>
        </div>

        {{-- Center: nav buttons (desktop) --}}
        <div class="d-none d-lg-flex align-items-center gap-2">
            <button class="btn btn-light" onclick="window.location.href='{{ route('shop.on-sale') }}'">On Sale</button>
            <button class="btn btn-light" onclick="window.location.href='{{ route('shop.new') }}'">New Arrivals</button>
            <button class="btn btn-light" onclick="window.location.href='{{ route('shop.bestsellers') }}'">Bestsellers</button>
        </div>

        {{-- Right: auth + icons --}}
        <div class="d-flex align-items-center gap-2">

            <div class="d-none d-lg-flex align-items-center gap-2">
                @guest
                    <button class="btn-navbar-action btn-navbar-ghost" onclick="window.location.href='{{ route('login') }}'">Sign In / Register</button>
                @endguest

                @auth
                    <div class="navbar-user-wrap">
                        <button type="button" class="navbar-icon-btn navbar-user-toggle" aria-haspopup="true" aria-expanded="false" aria-label="Account" title="Account">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 12c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm0 2c-3.33 0-10 1.68-10 5v3h20v-3c0-3.32-6.67-5-10-5z"/>
                            </svg>
                        </button>
                        <div class="navbar-user-menu">
                            <span class="navbar-user-menu-item" style="cursor:default; opacity:0.6;">
                                {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            </span>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="navbar-user-menu-item">Sign Out</button>
                            </form>
                            <form action="{{ route('profile.delete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="navbar-user-menu-item navbar-user-menu-item--danger">Delete Account</button>
                            </form>
                        </div>
                    </div>
                @endauth

                <a href="{{ route('shop.favorites') }}" class="navbar-icon-btn" title="Favorites">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                </a>

                <div class="navbar-cart-wrap">
                    <a href="{{ route('cart') }}" class="navbar-icon-btn" title="Cart">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM7.83 14l.94-2h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L20.1 3H4.21L3.27 1H0v2h2l3.6 7.59L4.25 13c-.16.28-.25.61-.25.95C4 15.1 4.9 16 6 16h14v-2H6.42c-.14 0-.25-.11-.25-.25l.03-.14.55-1.61z"/>
                        </svg>
                    </a>
                    <div class="navbar-cart-preview">
                        @include('partials.cart-preview')
                    </div>
                </div>
            </div>

            {{-- Mobile --}}
            @auth
                <div class="navbar-user-wrap d-lg-none">
                    <button type="button" class="navbar-icon-btn navbar-user-toggle" aria-haspopup="true" aria-expanded="false" aria-label="Account">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 12c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm0 2c-3.33 0-10 1.68-10 5v3h20v-3c0-3.32-6.67-5-10-5z"/>
                        </svg>
                    </button>
                    <div class="navbar-user-menu">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="navbar-user-menu-item">Sign Out</button>
                        </form>
                        <form action="{{ route('profile.delete') }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="navbar-user-menu-item navbar-user-menu-item--danger">Delete Account</button>
                        </form>
                    </div>
                </div>
            @endauth

            <a href="{{ route('cart') }}" class="navbar-icon-btn d-lg-none" title="Cart">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM7.83 14l.94-2h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L20.1 3H4.21L3.27 1H0v2h2l3.6 7.59L4.25 13c-.16.28-.25.61-.25.95C4 15.1 4.9 16 6 16h14v-2H6.42c-.14 0-.25-.11-.25-.25l.03-.14.55-1.61z"/>
                </svg>
            </a>

            <button class="navbar-icon-btn d-lg-none" id="navHamburger" aria-label="Menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
                </svg>
            </button>
        </div>
    </div>
</nav>

<div id="mobileMenu" style="display:none; position:fixed; top:var(--navbar-height); left:0; right:0; z-index:199; background:linear-gradient(135deg,#8B5CF6 0%,#A78BFA 100%); padding:12px 16px 16px; border-top:1px solid rgba(255,255,255,0.2); flex-direction:column; gap:8px; box-shadow:0 4px 12px rgba(0,0,0,0.15);">
    <div class="d-flex flex-column gap-2">
        <button class="btn btn-light w-100 text-start" onclick="window.location.href='{{ route('shop.favorites') }}'">❤ Favorites</button>
        <button class="btn btn-light w-100 text-start" onclick="window.location.href='{{ route('shop.on-sale') }}'">On Sale</button>
        <button class="btn btn-light w-100 text-start" onclick="window.location.href='{{ route('shop.new') }}'">New Arrivals</button>
        <button class="btn btn-light w-100 text-start" onclick="window.location.href='{{ route('shop.bestsellers') }}'">Bestsellers</button>
    </div>
    @guest
    <div class="d-flex flex-column gap-2 mt-2" style="border-top:1px solid rgba(255,255,255,0.2);padding-top:10px;">
        <button class="btn-navbar-action btn-navbar-ghost w-100" onclick="window.location.href='{{ route('login') }}'">Sign In / Register</button>
    </div>
    @endguest
</div>

<script>
    document.getElementById('navHamburger').addEventListener('click', function () {
        const menu = document.getElementById('mobileMenu');
        menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
    });

    document.querySelectorAll('.navbar-user-wrap').forEach(function (wrap) {
        const btn = wrap.querySelector('.navbar-user-toggle');
        const menu = wrap.querySelector('.navbar-user-menu');
        if (!btn || !menu) return;
        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            const isOpen = menu.classList.contains('show');
            document.querySelectorAll('.navbar-user-menu.show').forEach(m => m.classList.remove('show'));
            menu.classList.toggle('show', !isOpen);
            btn.setAttribute('aria-expanded', String(!isOpen));
        });
    });

    document.addEventListener('click', function (e) {
        document.querySelectorAll('.navbar-user-wrap').forEach(function (wrap) {
            if (!wrap.contains(e.target)) {
                const menu = wrap.querySelector('.navbar-user-menu');
                const btn = wrap.querySelector('.navbar-user-toggle');
                if (menu) menu.classList.remove('show');
                if (btn) btn.setAttribute('aria-expanded', 'false');
            }
        });
    });

    (function () {
        const searchInput = document.getElementById('searchInput');
        const clearBtn = document.getElementById('searchClearBtn');
        if (!searchInput || !clearBtn) return;
        const isSearchPage = {{ request()->is('search') ? 'true' : 'false' }};
        function updateClear() { clearBtn.style.display = searchInput.value.length > 0 ? 'flex' : 'none'; }
        searchInput.addEventListener('input', updateClear);
        clearBtn.addEventListener('click', function () {
            if (isSearchPage) { window.location.href = '/shop'; return; }
            searchInput.value = '';
            searchInput.focus();
            updateClear();
        });
    })();

    (function () {
        const searchInput = document.getElementById('searchInput');
        const suggestionsBox = document.getElementById('searchSuggestions');
        if (!searchInput || !suggestionsBox) return;
        let debounceTimer = null;
        let activeController = null;
        function close() { suggestionsBox.innerHTML = ''; suggestionsBox.classList.remove('show'); }
        function render(items, query) {
            suggestionsBox.innerHTML = '';
            if (!items.length) {
                const empty = document.createElement('div');
                empty.className = 'search-suggestion-empty';
                empty.textContent = 'No results for "' + query + '"';
                suggestionsBox.appendChild(empty);
                suggestionsBox.classList.add('show');
                return;
            }
            items.forEach(function (item) {
                const link = document.createElement('a');
                link.href = item.url;
                link.className = 'search-suggestion-item';
                const img = document.createElement('img');
                img.className = 'search-suggestion-image';
                img.alt = '';
                if (item.image) img.src = item.image;
                link.appendChild(img);
                const name = document.createElement('span');
                name.className = 'search-suggestion-name';
                name.textContent = item.name;
                link.appendChild(name);
                const price = document.createElement('span');
                price.className = 'search-suggestion-price';
                price.textContent = item.price + ' €';
                link.appendChild(price);
                suggestionsBox.appendChild(link);
            });
            suggestionsBox.classList.add('show');
        }
        searchInput.addEventListener('input', function () {
            const value = searchInput.value.trim();
            clearTimeout(debounceTimer);
            if (!value.length) { close(); return; }
            debounceTimer = setTimeout(function () {
                if (activeController) activeController.abort();
                activeController = new AbortController();
                fetch('/search/suggest?query=' + encodeURIComponent(value), { signal: activeController.signal })
                    .then(r => r.json()).then(items => render(items, value)).catch(() => {});
            }, 250);
        });
        searchInput.addEventListener('focus', function () {
            if (searchInput.value.trim().length > 0 && suggestionsBox.innerHTML !== '') suggestionsBox.classList.add('show');
        });
        searchInput.addEventListener('keydown', e => { if (e.key === 'Escape') close(); });
        document.addEventListener('click', e => { if (!searchInput.contains(e.target) && !suggestionsBox.contains(e.target)) close(); });
    })();
</script>
