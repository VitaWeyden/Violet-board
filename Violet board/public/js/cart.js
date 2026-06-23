function checkCart() {
    // Read the actual item count from the DOM (rendered server-side)
    const countEl   = document.querySelector('.cart-grand-count');
    const totalItems = countEl ? parseInt(countEl.textContent.trim(), 10) : 0;

    if (isNaN(totalItems) || totalItems === 0) {
        if (typeof window.showThemedAlert === 'function') {
            window.showThemedAlert('Your cart is empty.');
        } else {
            alert('Your cart is empty.');
        }
        return;
    }

    window.location.href = '/delivery/courier';
}
