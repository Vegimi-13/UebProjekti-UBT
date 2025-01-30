document.getElementById("sign-up").addEventListener("submit", ()=>  {
    event.preventDefault(); // Prevent form submission
    let isValid = true;
  
    // Clear previous error messages
    document.getElementById("usernameError").textContent = "";
    document.getElementById("emailError").textContent = "";
    document.getElementById("passwordError").textContent = "";
  
    // Validate username
    const username = document.getElementById("username").value.trim();
    if (username === "") {
      document.getElementById("usernameError").textContent = "Username is required.";
      isValid = false;
    }
  
    // Validate email
    const email = document.getElementById("email").value.trim();
    if (email === "") {
      document.getElementById("emailError").textContent = "Email is required.";
      isValid = false;
    } else if (!/\S+@\S+\.\S+/.test(email)) {
      document.getElementById("emailError").textContent = "Invalid email format.";
      isValid = false;
    }
  
    // Validate password
    const password = document.getElementById("password").value.trim();
    if (password === "") {
      document.getElementById("passwordError").textContent = "Password is required.";
      isValid = false;
    } else if (password.length < 8) {
      document.getElementById("passwordError").textContent = "Password must be at least 8 characters.";
      isValid = false;
    }

    const confirmPassword = document.getElementById("confirmPassword").value.trim();
      if (confirmPassword === "") {
        document.getElementById("confirmPasswordError").textContent = "Please confirm your password.";
        isValid = false;
      } else if (confirmPassword !== password) {
          document.getElementById("confirmPasswordError").textContent = "Passwords do not match.";
          isValid = false;
      }
  
    // If valid, you can proceed with form submission or additional logic
    if (isValid) {
      alert("Sign Up successful!");
      window.location.href ="../index.html"
      // Example: you could submit the form via AJAX here
      // this.submit(); // Uncomment to actually submit the form
    }
  });
  

