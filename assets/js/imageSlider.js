// Define an array of image filenames for your slider
const images = [
    '1.jpg',
    '2.jpg',
    '3.jpg', // Update this to match your image filenames
];

let currentIndex = 0;
const sliderImages = document.querySelectorAll('#slider img');

// Function to change the image in the slider
function changeImage() {
    sliderImages[currentIndex].style.opacity = 0; // Hide the current image

    currentIndex = (currentIndex + 1) % images.length;

    sliderImages[currentIndex].style.opacity = 1; // Show the next image

    // Change the image every 3 seconds (adjust this timing as needed)
    setTimeout(changeImage, 3000);
}

// Call the function to start the image slider
changeImage();