document.addEventListener('DOMContentLoaded', function () {
    const baseName = document.getElementById('activeImage').dataset.basename;
    const imageFolder = document.getElementById('activeImage').dataset.imagefolder;
    let currentIndex = 1;
    const maxImages = 2;

    window.changeImage = function (direction) {
        let newIndex = currentIndex + direction;
        if (newIndex < 1) newIndex = maxImages;
        if (newIndex > maxImages) newIndex = 1;

        const testImg = new Image();
        const newSrc = imageFolder + baseName + newIndex + ".jpg";
        testImg.src = newSrc;

        testImg.onload = function () {
            document.getElementById('activeImage').src = newSrc;
            currentIndex = newIndex;
        };

        testImg.onerror = function () {
            const fallbackIndex = direction > 0 ? newIndex + 1 : newIndex - 1;
            if (fallbackIndex !== currentIndex && fallbackIndex >= 1 && fallbackIndex <= maxImages) {
                currentIndex = fallbackIndex;
                changeImage(direction);
            }
        };
    };
});
