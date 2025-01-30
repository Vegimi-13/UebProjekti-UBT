document.getElementById("signinForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent form submission
  
    let isValid = true;
  
    document.getElementById("emailError").textContent = "";
    document.getElementById("passwordError").textContent = "";
  
    // validimi i emailit
    const email = document.getElementById("email").value.trim();
    if (email === "") {
      document.getElementById("emailError").textContent = "Email is required.";
      isValid = false;
    } else if (!/\S+@\S+\.\S+/.test(email)) {
      document.getElementById("emailError").textContent = "Invalid email format.";
      isValid = false;
    }
  
    //validimi i passwordit
    const password = document.getElementById("password").value.trim();
    if (password === "") {
      document.getElementById("passwordError").textContent = "Password is required.";
      isValid = false;
    } else if (password.length < 8) {
      document.getElementById("passwordError").textContent = "Password must be at least 8 characters.";
      isValid = false;
    }
  
    // If valid, proceed
    if (isValid) {
      alert("Sign In Successful!");

      // Te ben redirect ne homepage
      window.location.href ="../index.html"
      
    }
  });






  



  