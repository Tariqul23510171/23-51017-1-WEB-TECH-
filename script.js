console.log("connected");

let wrongCounter = 0;

function collectFormData() {
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  let emailError = "";
  let passError = "";

  if (!email) {
    emailError = "Email is required";
  } else if (!email.includes("@")) {
    emailError = "Email must contain '@'";
  }

  if (!password) {
    passError = "Password is required";
  } else {
    if (password.length < 6) {
      passError += "Password must be at least 6 characters<br>";
    }
    if (!password.includes("#")) {
      passError += "Password must contain '#'<br>";
    }
  }

  document.getElementById("emailErr").innerHTML = emailError;
  document.getElementById("passErr").innerHTML = passError;

  if (emailError !== "" || passError !== "") {
    wrongCounter++;
    document.getElementById("wrongCount").innerHTML =
      "Wrong Submission Count: " + wrongCounter;
    return false;
  }

  alert("Login Successful!");
  return false; 
}

function getEmail() {
  const email = document.getElementById("email").value;
  console.log("Email:", email);
}

function getpassword(){
    const password = document.getElementById("password").value;
    console.log("Passwrord:",password);
}