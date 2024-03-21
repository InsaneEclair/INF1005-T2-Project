document.addEventListener('DOMContentLoaded', function() {
    const images = document.getElementsByClassName('img-thumbnail'); 

    Array.from(images).forEach((img) => {
        img.addEventListener('click', function(event) {
            event.preventDefault();

            // Check for and remove any existing popup image
            const existingPopup = document.querySelector('.img-popup');
            if (existingPopup) {
                existingPopup.parentElement.removeChild(existingPopup);
            }

            // Create the popup image
            const popup = document.createElement('div');
            popup.setAttribute('class', 'img-popup');

            const popupImg = document.createElement('img');
            popupImg.src = this.src.replace('_small', '_large');
            popup.appendChild(popupImg);

            // Add the popup image to the DOM
            document.body.appendChild(popup);

            // Add event listener to close the popup image
            popup.addEventListener('click', function() {
                this.parentElement.removeChild(this);
            });
        });
    });

    function activateMenu() {
        const navLinks = document.querySelectorAll('nav a');
        navLinks.forEach(link => {
            if (link.href === location.href) {
                link.classList.add('active');
            }
        })
    }
    activateMenu(); // Call the function here
});
