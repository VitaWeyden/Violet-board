document.addEventListener('DOMContentLoaded', function () {
    const submitBtn = document.getElementById('submit-btn');
    const form = document.getElementById('shipping-form');

    submitBtn.addEventListener('click', function (e) {
        e.preventDefault();
        const inputs = form.querySelectorAll('input, select' );
        let isValid = true;

        inputs.forEach(input => {
            const pattern = input.getAttribute('pattern');
            const regex = pattern ? new RegExp(pattern) : null;

            if (!input.value || (regex && !regex.test(input.value))) {
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');
                isValid = false;
            } else {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
            }
        });
        

        const boxSelect = form.querySelector('select[name="box_id"]');
        if (!boxSelect.value) {
            boxSelect.classList.add('is-invalid');
            alert('Prosím, vyberte si box!');
            isValid = false;
        } else {
            boxSelect.classList.remove('is-invalid');
        }

        if (!isValid) {
            e.preventDefault();
        } else {
            form.submit();
        }
    });
});
