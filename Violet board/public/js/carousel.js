document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.carousel-section').forEach(section => {
        const scrollContainer = section.querySelector('.carousel-scroll');
        const card = section.querySelector('.product-card');
        if (!card) return;

        const cardWidth = card.offsetWidth + 20;

        section.querySelector('.left-arrow').addEventListener('click', () => {
            scrollContainer.scrollBy({ left: -cardWidth * 3, behavior: 'smooth' });
        });

        section.querySelector('.right-arrow').addEventListener('click', () => {
            scrollContainer.scrollBy({ left: cardWidth * 3, behavior: 'smooth' });
        });
    });
});
