document.addEventListener("DOMContentLoaded", function () {
    const carousels = document.querySelectorAll('.carousel-section');

    carousels.forEach((carouselSection) => {
        const wrapper = carouselSection.querySelector('.carousel-content');
        const view = carouselSection.querySelector('.carousel-view');
        const cards = wrapper.querySelectorAll('.product-card');
        const leftArrow = carouselSection.querySelector('.arrow.left');
        const rightArrow = carouselSection.querySelector('.arrow.right');

        const cardWidth = 170;
        let currentIndex = 0;
        let visibleCount = 3;

        function updateVisibleCount() {
            const viewWidth = view.offsetWidth;
            visibleCount = Math.floor(viewWidth / cardWidth);
        }

        function updateCarousel() {
            updateVisibleCount();
            const maxIndex = Math.max(0, cards.length - visibleCount);
            currentIndex = Math.max(0, Math.min(currentIndex, maxIndex));
            const offset = -currentIndex * cardWidth;
            wrapper.style.transform = `translateX(${offset}px)`;
        }

        window.addEventListener('resize', updateCarousel);

        leftArrow.addEventListener('click', () => {
            currentIndex--;
            updateCarousel();
        });

        rightArrow.addEventListener('click', () => {
            currentIndex++;
            updateCarousel();
        });

        updateCarousel();
    });
});
