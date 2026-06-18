document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('appSidebar');
    const toggle = document.getElementById('sidebarToggle');
    const mainContent = document.getElementById('mainContent');

    if (!sidebar || !toggle) return;

    toggle.addEventListener('click', () => {
        const collapsed = sidebar.classList.toggle('collapsed');
        toggle.classList.toggle('collapsed', collapsed);
        toggle.innerHTML = collapsed ? '&#9654;' : '&#9664;';
        if (mainContent) {
            mainContent.classList.toggle('expanded', collapsed);
        }
    });
});
