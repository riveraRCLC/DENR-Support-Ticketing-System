<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="/DENR-Support-Ticketing-System/index.php"><b>TICKETING </b>SYSTEM</a>
  </div>
  <?php include('message.php'); ?>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

     

          <form action="code-register.php" method="POST" onsubmit="return validateForm()">
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="firstName" class="form-control" placeholder="First Name">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="middleName" class="form-control" placeholder="Middle Name">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="lastName" class="form-control" placeholder="Last Name">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        
        <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control" placeholder="Confirm Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                    <label for="agreeTerms">
                        I agree to the <a href="#">terms</a>
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" name="register_acct" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <script>
            function validateForm() {
                // Get the input values
                var email = document.getElementsByName("email")[0].value;
                var firstName = document.getElementsByName("firstName")[0].value;
                var middleName = document.getElementsByName("middleName")[0].value;
                var lastName = document.getElementsByName("lastName")[0].value;
                var password = document.getElementById("password").value;
                var passwordConfirm = document.getElementById("passwordConfirm").value;
                
                // Check for empty fields
                if (email === "" || firstName === "" || lastName === "" || password === "" || passwordConfirm === "") {
                    alert("All fields are required. Please fill in all the fields.");
                    return false; // Prevent form submission
                }
                
                // Check if the password meets the requirements (8 characters and alphanumeric)
                if (password.length < 8 || !/^(?=.*[0-9])(?=.*[A-Za-z]).{8,}$/.test(password)) {
                    alert("Password must be at least 8 characters long and contain both letters and numbers.");
                    return false; // Prevent form submission
                }
                
                // Check if password and passwordConfirm match
                if (password !== passwordConfirm) {
                    alert("Password and Confirm Password do not match.");
                    return false; // Prevent form submission
                }
                
                // Check if First Name, Middle Name, and Last Name contain numbers
                var nameRegex = /^[A-Za-z\s]+$/;
                if (!nameRegex.test(firstName) || !nameRegex.test(middleName) || !nameRegex.test(lastName)) {
                    alert("First Name, Middle Name, and Last Name should not contain numbers.");
                    return false; // Prevent form submission
                }
                
                // Capitalize the first character of First Name, Middle Name, and Last Name
                firstName = firstName.charAt(0).toUpperCase() + firstName.slice(1);
                middleName = middleName.charAt(0).toUpperCase() + middleName.slice(1);
                lastName = lastName.charAt(0).toUpperCase() + lastName.slice(1);
                
                // Update the input fields with the capitalized names
                document.getElementsByName("firstName")[0].value = firstName;
                document.getElementsByName("middleName")[0].value = middleName;
                document.getElementsByName("lastName")[0].value = lastName;
                
                // If all checks pass, allow the form submission
                return true;
            }
    </script>


    </form>


      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="login.html" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
