<?php 
require("dbcon.php");

// Start or resume session
session_start();

// Check if the user is already logged in
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // If logged in, redirect to home page or wherever you want
    header("Location: home.html");
    exit;
}

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $query = "SELECT * FROM customer WHERE Email='$email' && Password='$pass'";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) >= 1) {
        // If login successful, set session variable
        $_SESSION['loggedin'] = true;
        header("Location: home.html");
        exit;
    } else {
        echo "<script>alert('Invalid Email/Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="loginPage.css" />
    <link rel="stylesheet" href="hhhhhhhh.css" />
    <title>Sign In</title>
  </head>
  <body>
    <header style="background-color: transparent">
      <div class="logo">
        <h2 id="CinemaName" style="cursor: pointer">OCinema</h2>
      </div>
      <nav class="navigation">
        <a href="home.html">Now Showing</a>
        <a href="comingsoon.html">Coming Soon</a>
        <a href="contact.html">Contact</a>
      </nav>
      <div class="login">
        <?php
        // Check if the user is logged in
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            // If logged in, display the "MY ACCOUNT" button
            echo '<button id="myaccButton">MY ACCOUNT</button>';
        } else {
            // If not logged in, display the login button
            echo '<button id="loginnButton"><i class="fas fa-user"></i>LOG IN</button>';
        }
        ?>
      </div>
    </header>
    <div class="">
      <div class="container">
        <div class="left-section">
          <div class="inner-content">
            <p style="text-align: center; font-weight: 600; margin-left: 270px">
              Welcome to OCinema, where you can enjoy the best
              movies
            </p>
            <p style="text-align: center; font-weight: 600; margin-left: 270px">
              from around the world in a comfortable and elegant setting.
            </p>
            <div class="maintagcontact" style="width: 100%; text-align: center">
              <img src="chair.jpg" width="265" />
            </div>
          </div>
        </div>
        <div class="right-section">
          <div class="signin-form">
            <h2
              style="margin-bottom: 30px;font-family: Verdana, Geneva, Tahoma, sans-serif;">
              Sign in
            </h2>
            <form method="POST" id="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <input type="hidden"name="_token"value="pWq4HX8tMeM8xB9QO4YlZLjRhZ6wedVNy0jEgqsq"/>
              <div class="form-group">
                <label for="email"><i class=""></i></label>
                <input id="email"name="email"type="email"class="textelement"value=""placeholder="Your Email"required/>
              </div>
              <div class="form-group">
                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                <input id="password"type="password"name="password"class="textelement"placeholder="Your Password"required/>
              </div>
              <div class="form-group text-right"style="text-align: right;font-size: 14px;margin-top: 5px;margin-bottom: 25px;">
                <input type="checkbox" name="remember" id="remember" class="" />
                <label for="remember-me" class="">Remember me</label>
              </div>
              <div class="" style="margin-bottom: 20px">
                <input type="submit"name="signin"id="signin"class="btn_primary"value="Sign in"/>
              </div>
            </form>
            <div class="row" id="roww">
              <div class="">
                <span class="dont-have-account">Don't have an account?
                  <a href="createAcc.html"class="create-account"style="text-decoration: none">Create An Account</a>-
                  <a href="passReset.html"class="forgot-password"style="text-decoration: none">Forgot Password?</a></span>
              </div>
              <div class="">
                <div class="social-login">
                  <ul class="social_login no-bullet">
                    <li class="pt-1 orc">
                      <b><span style="color: #a02d8a; padding-left: 25px">OR CONNECT WITH</span></b>
                    </li>
                    <li>
                      <a href="https://google.com/"><img src="google.png" class="social-icon"/></a>
                    </li>
                    <li><a href="https://twitter.com"><img src="twitter.png" class="social-icon"
                      /></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("loginnButton").addEventListener("click", function () {
            window.location.href = "loginPage.html";
          });
      });
      document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("CinemaName").addEventListener("click", function () {
            window.location.href = "home.html";
          });
      });
      document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("myaccButton").addEventListener("click", function () {
            window.location.href = "myAcc.html";
          });
      });
    </script>
    <footer>
      <hr style="opacity: 0.5" />
      <div class="footer-container">
        <div class="footer-icons">
          <a href="https://facebook.com"><i class="fab fa-facebook-f"></i></a>
          <a href="https://instagram.com"><i class="fab fa-instagram"></i></a>
          <a href="https://tiktok.com"><i class="fab fa-tiktok"></i></a>
        </div>
        <div class="footer-nav">
          <ul>
            <li><a href="aboutus.html">About us</a></li>
            <li><a href="privacy.html">Privacy Policy</a></li>
            <li><a href="refunds.html">Refunds & Exchanges</a></li>
            <li><a href="termsofservice.html">Terms of Service</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p style="color: #a02d8a">
          &copy; 2024 All right reserved by OCinema
        </p>
      </div>
    </footer>
  </body>
</html>
