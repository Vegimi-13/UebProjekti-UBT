document.getElementById('sign-up').addEventListener('submit', function(event) {
    

    // Clear previous error messages
    document.getElementById('usernameError').innerText = '';
    document.getElementById('emailError').innerText = '';
    document.getElementById('passwordError').innerText = '';
    document.getElementById('confirmPasswordError').innerText = '';

    // Get the form values
    var username = document.getElementById('username').value.trim();
    var email = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value.trim();
    var confirmPassword = document.getElementById('confirmPassword').value.trim();

    var valid = true;

    // Validate username
    if (username === '') {
        document.getElementById('usernameError').innerText = 'Username is required.';
        valid = false;
    }

    // Validate email
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (email === '' || !emailPattern.test(email)) {
        document.getElementById('emailError').innerText = 'Please enter a valid email address.';
        valid = false;
    }

    // Validate password
    if (password === '') {
        document.getElementById('passwordError').innerText = 'Password is required.';
        valid = false;
    }else if (password.length < 8) {
        document.getElementById('passwordError').innerText = 'Password must be at least 8 characters long.';
        valid = false;
    }

    // Validate confirm password
    if (confirmPassword !== password) {
        document.getElementById('confirmPasswordError').innerText = 'Passwords do not match.';
        valid = false;
    }

    // If the form is valid, submit it to the server
    if (!valid) {
        // Prevent the form from submitting if validation fails
        event.preventDefault();
    }else{
        this.action = '../../controllers/registerController.php'; // Set the correct action
        this.submit();
    }
});
