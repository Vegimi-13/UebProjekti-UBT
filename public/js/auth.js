document.getElementById('signinForm').addEventListener('submit', function(event) {
  // Clear previous error messages
  document.getElementById('emailError').innerText = '';
  document.getElementById('passwordError').innerText = '';

  // Get form values
  var email = document.getElementById('email').value.trim();
  var password = document.getElementById('password').value.trim();

  var valid = true;

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
  }

  // If the form is valid, submit it to the server
  if (!valid) {
      // Prevent the form from submitting if validation fails
      event.preventDefault();
  } else {
      // For successful validation, proceed with form submission
      this.action = './../../controllers/loginController.php'; // Set the correct action
      this.submit(); // Submit the form
  }
});