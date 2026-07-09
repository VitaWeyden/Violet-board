<?php

// Shared category list + icon markup — used by the sidebar and the
// home page category rail, so both stay in sync.
//
// NOTE: this is a plain PHP file (not a .blade.php partial). Blade's
// @include() does not leak variables back to the including view, so
// defining $sidebarCategories inside an @included partial would leave
// it undefined in sidebar.blade.php / home.blade.php. Returning the
// data from a plain `include()` and assigning it locally avoids that.

return [

    'categories' => [
        'strategy-games'  => 'Strategy Games',
        'card-games'      => 'Card Games',
        'party-games'     => 'Party Games',
        'family-games'    => 'Family Games',
        'childrens-games' => "Children's Games",
        'memory-games'    => 'Memory Games',
    ],

    'icons' => [
        // chess rook — strategy
        'strategy-games'  => '<path stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" d="M7 4v3h2V4h2.5v3h1V4H15v3h2V4h1v5l-2 2v6H8v-6L6 9V4h1z"/><path stroke="currentColor" stroke-width="1.8" stroke-linecap="round" d="M6 20h12"/>',
        // playing cards
        'card-games'      => '<rect x="4" y="5" width="10" height="14" rx="2" stroke="currentColor" stroke-width="1.8"/><path stroke="currentColor" stroke-width="1.8" stroke-linecap="round" d="M16 6.5l3.4 1.2-3.9 11-1.8-.6"/><path fill="currentColor" d="M9 10.2c.9-1.4 3-.4 2 1.2-.5.8-2 2-2 2s-1.5-1.2-2-2c-1-1.6 1.1-2.6 2-1.2z"/>',
        // balloon — party
        'party-games'     => '<path stroke="currentColor" stroke-width="1.8" d="M12 4c3 0 5 2.2 5 5.2 0 3.2-2.4 5.8-5 5.8s-5-2.6-5-5.8C7 6.2 9 4 12 4z"/><path stroke="currentColor" stroke-width="1.8" stroke-linecap="round" d="M12 15v1.5c0 1.5-1.5 1.5-1.5 3"/>',
        // people — family
        'family-games'    => '<circle cx="8.5" cy="8.5" r="2.5" stroke="currentColor" stroke-width="1.8"/><circle cx="16" cy="9.5" r="2" stroke="currentColor" stroke-width="1.8"/><path stroke="currentColor" stroke-width="1.8" stroke-linecap="round" d="M4 19c0-2.5 2-4.5 4.5-4.5S13 16.5 13 19M14.5 19c0-2 1.4-3.5 3.2-3.5 1 0 1.8.4 2.3 1"/>',
        // teddy/smile — children
        'childrens-games' => '<circle cx="12" cy="13" r="6" stroke="currentColor" stroke-width="1.8"/><circle cx="7" cy="7" r="2" stroke="currentColor" stroke-width="1.8"/><circle cx="17" cy="7" r="2" stroke="currentColor" stroke-width="1.8"/><circle cx="10" cy="12" r=".9" fill="currentColor"/><circle cx="14" cy="12" r=".9" fill="currentColor"/><path stroke="currentColor" stroke-width="1.6" stroke-linecap="round" d="M10.5 15.2c.9.8 2.1.8 3 0"/>',
        // brain/puzzle — memory
        'memory-games'    => '<path stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" d="M9 4.5A2.5 2.5 0 0 0 6.5 7v.3A3 3 0 0 0 4.5 10a3 3 0 0 0 1 5.7A2.8 2.8 0 0 0 8.3 19c1.5 0 3.7-1 3.7-2.8V7A2.5 2.5 0 0 0 9 4.5z"/><path stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" d="M15 4.5A2.5 2.5 0 0 1 17.5 7v.3a3 3 0 0 1 2 2.7 3 3 0 0 1-1 5.7 2.8 2.8 0 0 1-2.8 3.3c-1.5 0-3.7-1-3.7-2.8V7A2.5 2.5 0 0 1 15 4.5z"/>',
    ],

    // A distinct accent color per category, used for the home page tiles.
    'colors' => [
        'strategy-games'  => '#7C3AED',
        'card-games'      => '#DB2777',
        'party-games'     => '#F59E0B',
        'family-games'    => '#059669',
        'childrens-games' => '#2563EB',
        'memory-games'    => '#DC2626',
    ],

];
