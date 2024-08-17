// script.js

// Add an event listener to all pie images
document.querySelectorAll('section.pies img').forEach((img) => {
    img.addEventListener('mouseover', () => {
        img.style.boxShadow = '0 4px 15px rgba(0, 0, 0, 0.2)';
    });

    img.addEventListener('mouseout', () => {
        img.style.boxShadow = 'none';
    });
});
