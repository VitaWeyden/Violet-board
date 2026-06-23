document.addEventListener('DOMContentLoaded', function () {
    const loginButton = document.getElementById('loginButton');

    if (loginButton) {
        loginButton.addEventListener('click', function () {
            const email    = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();

            if (!email || !password) {
                alert('Please fill in all fields.');
                return;
            }

            window.location.href = loginButton.dataset.redirect;
        });
    }
});
