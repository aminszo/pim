
$(document).ready(function () {

});

// Wait for the DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    // Get all product image elements
    var productImages = document.querySelectorAll('.product-image img');

    // Loop through each product image
    productImages.forEach(function(img) {
        // Add click event listener
        img.addEventListener('click', function() {
            // Get the product code element
            var codeElement = this.parentElement.querySelector('.product-code');

            // Show the product code
            codeElement.style.opacity = 1;

            // Set timeout to hide the product code after 1 second (1000 milliseconds)
            setTimeout(function() {
                codeElement.style.opacity = 0;
            }, 1000);
        });
    });
});