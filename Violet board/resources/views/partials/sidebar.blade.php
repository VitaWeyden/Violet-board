<aside class="sidebar" id="sidebar">
    <div class="d-flex flex-column">
        <button onclick="location.href='{{ url('/shop') }}'" class="category-button">Všetky hry</button>
        <hr style="border-color: rgba(255,255,255,0.4); margin: 6px 0; border-width: 2px; opacity: 1;">
        <button onclick="location.href='{{ url('/shop/vedomostne') }}'" class="category-button">Vedomostné hry</button>
        <button onclick="location.href='{{ url('/shop/karty') }}'" class="category-button">Kartové hry</button>
        <button onclick="location.href='{{ url('/shop/party') }}'" class="category-button">Party hry</button>
        <button onclick="location.href='{{ url('/shop/rodinne') }}'" class="category-button">Rodinné hry</button>
        <button onclick="location.href='{{ url('/shop/deti') }}'" class="category-button">Pre deti</button>
        <button onclick="location.href='{{ url('/shop/strategia') }}'" class="category-button">Štrategické hry</button>
        <button onclick="location.href='{{ url('/shop/puzzle') }}'" class="category-button">Puzzle</button>
        <button onclick="location.href='{{ url('/shop/pamat') }}'" class="category-button">Pamäťové hry</button>
    </div>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('sidebar');
        const w = sidebar.scrollWidth;
        sidebar.style.width = w + 'px';
        document.documentElement.style.setProperty('--sidebar-w', w + 'px');

        const toggle = document.getElementById('sidebarToggle');
        if (toggle) toggle.style.left = w + 'px';
    });
</script>
