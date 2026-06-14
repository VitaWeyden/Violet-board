<nav class="navbar navbar-light fixed-top">
    <div class="container-fluid d-flex align-items-center flex-nowrap" style="gap: 0;">

        {{-- Left: home + search --}}
        <div class="d-flex align-items-center gap-2 me-3">
            <a href="/" class="navbar-home-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                </svg>
            </a>
            <form action="{{ route('search') }}" method="GET" class="d-flex">
                <input type="text" name="query" class="search-bar" placeholder="Zadajte, čo hľadáte...">
            </form>
        </div>

        {{-- Center: nav buttons --}}
        <div class="d-flex align-items-center gap-2 mx-auto">
            <button class="btn btn-light" onclick="window.location.href='/shop/akcie'">Akcie</button>
            <button class="btn btn-light" onclick="window.location.href='/shop/novinky'">Novinky</button>
            <button class="btn btn-light" onclick="window.location.href='/shop/best-sellers'">Best sellers</button>
        </div>

        {{-- Right: auth + icons --}}
        <div class="d-flex align-items-center gap-2 ms-3">
            @if(Auth::check())
                <form action="{{ route('profil.zmazat') }}" method="POST" onsubmit="return confirm('Naozaj chcete vymazať svoj účet?');" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-navbar-action btn-navbar-danger">Vymazať účet</button>
                </form>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn-navbar-action btn-navbar-ghost">Odhlásiť</button>
                </form>
            @else
                <button class="btn-navbar-action btn-navbar-ghost" onclick="window.location.href='/prihlasenie'">Prihlásenie / Registrácia</button>
            @endif

            <a href="/shop/oblubene" class="navbar-icon-btn" title="Obľúbené">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
            </a>

            <a href="/kosik" class="navbar-icon-btn" title="Košík">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM7.83 14l.94-2h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L20.1 3H4.21L3.27 1H0v2h2l3.6 7.59L4.25 13c-.16.28-.25.61-.25.95C4 15.1 4.9 16 6 16h14v-2H6.42c-.14 0-.25-.11-.25-.25l.03-.14.55-1.61z"/>
                </svg>
            </a>
        </div>

    </div>
</nav>
