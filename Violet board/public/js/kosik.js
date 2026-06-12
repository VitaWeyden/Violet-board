function checkCart() {
    const cart = window.cartData || {};
    let total = 0;

    for (const id in cart) {
        const item = cart[id];
        total += item.price * item.quantity;
    }

    if (Object.keys(cart).length === 0 || total === 0) {
        alert('Košík je prázdny.');
        return;
    }

    window.location.href = '/boxcollect';
}
