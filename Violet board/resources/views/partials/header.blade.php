<nav class="navbar navbar-light fixed-top py-2">
    <div class="container">
        <div class="d-flex flex-column w-100">
            <div class="d-flex justify-content-between align-items-center">
                <a class="navbar-brand" href="#"><img src="{{ asset('Pictures/logo.jpg') }}" alt="Logo" class="logo"></a>
                <form action="{{ route('search') }}" method="GET" class="mx-3 w-100">
                    <input type="text" name="query" class="search-bar w-100" placeholder="Zadajte, čo hľadáte...">
                </form>
                <div>

                    @if(auth()->check())
                        <form action="{{ route('profil.zmazat') }}" method="POST" onsubmit="return confirm('Naozaj chcete vymazať svoj účet?');" class="d-inline-block ms-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Vymazať účet</button>
                        </form>
                    @endif

                    @if(Auth::check())
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark">Odhlásiť</button>
                        </form>
                    @else
                        <button class="btn btn-outline-primary" onclick="window.location.href='/prihlasenie'">Prihlásenie/Registrácia</button>
                    @endif

                    <button class="btn btn-outline-danger" onclick="window.location.href='/shop/oblubene'">❤️</button>
                    <button class="btn btn-outline-dark" onclick="window.location.href='/kosik'">🛒</button>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button class="btn btn-light mx-1" onclick="window.location.href='/'">🏠</button>
                <button class="btn btn-light mx-1" onclick="window.location.href='/shop/akcie'">Akcie</button>
                <button class="btn btn-light mx-1" onclick="window.location.href='/shop/novinky'">Novinky</button>
                <button class="btn btn-light mx-1" onclick="window.location.href='/shop'">Shop</button>
                <button class="btn btn-light mx-1" onclick="window.location.href='/shop/best-sellers'">Best sellers</button>
            </div>

        </div>
    </div>
</nav>
