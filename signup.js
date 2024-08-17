document.getElementById('signupForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (password !== confirmPassword) {
        alert('Passwords do not match. Please try again.');
        return;
    }

    alert('Sign-Up successful! Welcome to Dessert Delight.');
    // Optionally, here you can handle the form submission via AJAX or redirect the user.
});
