document.addEventListener('DOMContentLoaded', () => {
    const radioCard = document.getElementById('radio-card');
    const radioCash = document.getElementById('radio-cash');
    const cardNumber = document.getElementById('card-number');
    const cardExpiry = document.getElementById('card-expiry');
    const cardCvc = document.getElementById('card-cvc');
    const submitButton = document.querySelector('.btn-dark');

    const cardInputs = [cardNumber, cardExpiry, cardCvc];

    function selectPayment(option) {
        radioCard.classList.remove('selected');
        radioCash.classList.remove('selected');
        document.getElementById(`radio-${option}`).classList.add('selected');

        const isCard = option === 'card';
        cardInputs.forEach(input => {
            input.disabled = !isCard;
        });
    }

    window.selectPayment = selectPayment;


    cardNumber.addEventListener('input', (e) => {
        let value = cardNumber.value.replace(/\D/g, ''); // ami nem szam eltavolitja
        value = value.replace(/(.{4})(?=.)/g, '$1 ');
        cardNumber.value = value;
    });

    submitButton.addEventListener('click', (e) => {
        if (radioCard.classList.contains('selected')) {
            const cardNumClean = cardNumber.value.replace(/\s+/g, '');
            const expiryRegex = /^(0[1-9]|1[0-2])\/\d{2}$/;
            const cvcRegex = /^\d{3}$/;

            if (!/^\d{16}$/.test(cardNumClean)) {
                e.preventDefault();
                alert('Číslo karty musí mať presne 16 číslic.');
                return;
            }

            if (!expiryRegex.test(cardExpiry.value)) {
                e.preventDefault();
                alert('Formát dátumu: MM/RR (napr: 05/27)');
                return;
            } else {
                const [mm, yy] = cardExpiry.value.split('/').map(Number);
                const today = new Date();
                const expDate = new Date(2000 + yy, mm - 1);
                if (expDate < today) {
                    e.preventDefault();
                    alert('Platnosť karty vypršala.');
                    return;
                }
            }

            if (!cvcRegex.test(cardCvc.value)) {
                e.preventDefault();
                alert('Kód CVC musí mať presne 3 číslice.');
                return;
            }
        }

        window.location.href = '/dakujeme';
    });

    function submitPayment() {
        fetch('/place-order', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
            })
        })
        .then(response => {
            if (response.ok) {
                window.location.href = '/dakujeme';
            } else {
                alert('Error placing order');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error placing order');
        });
    }

});
