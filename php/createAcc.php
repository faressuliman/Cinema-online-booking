<?php
require "dbcon.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $repass = $_POST["password_confirmation"];
    $names = explode(" ", $name);
    $first_name = $names[0];
    $last_name = end($names);

    if ($pass != $repass) {
        echo '<script> alert("Password doesn\'t match")</script>';
    } 
    else{
        $sql = "SELECT * FROM customer WHERE Email = '$email' ";
        $res = mysqli_query($db, $sql) or die(mysqli_error($db));
        if (mysqli_num_rows($res) >= 1) {
            echo '<script>alert("Email already taken")</script>';
        } else { 
          mysqli_query($db,"insert into customer (First_Name, Last_Name, Email, Password) values ('$first_name', '$last_name', '$email', '$pass')");
          header( "location:loginPage.php");
            exit;
            } 
}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link rel="stylesheet" href="createAcc.css" />
    <link rel="stylesheet" href="hhhhhhhh.css" />
    <link rel="stylesheet" href="footer.css" />
    <title>Sign Up</title>
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
        <button id="myaccButton">MY ACCOUNT</button>
        <button id="loginnButton"><i class="fas fa-user" style="margin-right: 5px;"></i>LOG IN</button>
      </div>
    </header>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        document
          .getElementById("loginnButton")
          .addEventListener("click", function () {
            window.location.href = "loginPage.php";
          });
      });
      document.addEventListener("DOMContentLoaded", function () {
        document
          .getElementById("CinemaName")
          .addEventListener("click", function () {
            window.location.href = "home.html";
          });
      });
      document.addEventListener("DOMContentLoaded", function () {
        document
          .getElementById("myaccButton")
          .addEventListener("click", function () {
            window.location.href = "myAcc.html";
          });
      });

      //       document.getElementById("login-form").addEventListener("submit", function(event) {
      //     event.preventDefault();

      //     // Get user input
      //     var email = document.getElementById("email").value;
      //     var password = document.getElementById("password").value;

      //     // Store user data securely in localStorage
      //     localStorage.setItem("userEmail", email);
      //     localStorage.setItem("userPassword", password);

      //     // Redirect to login page
      //     window.location.href = "loginPage.html";
      // });

      document
        .getElementById("login-form")
        .addEventListener("submit", function (event) {
          event.preventDefault();
          var name = document.getElementById("name").value;
          localStorage.setItem("name", name);
          window.location.href = "loginPage.php";
        });
    </script>
    <div class="the_body m-0 p-0">
      <div class="container">
        <div class="left-section">
          <div>
            <p style="margin-left: 250px; font-weight: 600">
              Join us today and experience the magic of cinema like never
              before!
            </p>
            <div class="maintagcontact" style="width: 100%; text-align: center">
              <img src="chair.jpg" width="265;" />
            </div>
          </div>
        </div>
        <div class="right-section">
          <div class="signup-container">
            <div class="maintag mb-3">
              <h3 style="padding-bottom: 15px">Create An Account</h3>
            </div>
            <form
              method="POST"
              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
              class="register-form"
              id="login-form"
            >
              <div class="row">
                <div class="your-name">
                  <label for="name"></label>
                  <input
                    type="text"
                    name="name"
                    class="rns-form-element"
                    id="name"
                    value=""
                    placeholder="Your Name"
                    required
                  />
                </div>
                <div class="form-group col-md-6">
                  <input
                    type="text"
                    name="mobile"
                    class="rns-form-element"
                    id="mobile"
                    value=""
                    placeholder="Your Mobile Number"
                    required
                  />
                </div>
                <div class="form-group col-md-12">
                  <label for="email"></label>
                  <input
                    type="email"
                    name="email"
                    class="rns-form-element"
                    id="email"
                    value=""
                    placeholder="Your Email"
                    required
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="pass"></label>
                  <input
                    type="password"
                    name="password"
                    class="rns-form-element"
                    id="password"
                    value=""
                    placeholder="Your Password"
                    required
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="re-pass"></label>
                  <input
                    type="password"
                    class="rns-form-element"
                    name="password_confirmation"
                    id="password_confirmation"
                    placeholder="Repeat your password"
                    required
                  />
                </div>
              </div>
              <div
                class="form-group form-button"
                style="margin-bottom: 15px; margin-top: 10px"
              >
                <input
                  type="submit"
                  name="register"
                  id="register"
                  class="btn_primary"
                  value="Register"
                />
              </div>
            </form>
            <div class="row">
              <div
                class="col-md-12 col-sm-12 text-center mb-2 sub_notes"
                style="margin-left: 100px; margin-bottom: 20px"
              >
                Do you have an account?
                <a href="loginPage.html" class="purple-link">Login Now</a>
              </div>
              <div class="col-md-12 col-sm-12 text-center sub_notes mt-2">
                <div class="social-login">
                  <ul class="social_login">
                    <li class="pt-1 orc">
                      <b><span style="color: #a02d8a">OR CONNECT WITH</span></b>
                    </li>
                    <li>
                      <a href="https://google.com">
                        <img
                          src="https://rnscinemas.net/public/ui/images/checkout/google.png"
                          class="social-icon"
                        />
                      </a>
                    </li>
                    <li>
                      <a href="https://twitter.com">
                        <img
                          src="https://rnscinemas.net/public/ui/images/checkout/twitter.png"
                          class="social-icon"
                        />
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <hr style="opacity: 0.5" />
      <div class="footer-container">
        <div class="footer-icons">
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
          <a href=""><i class="fab fa-tiktok"></i></a>
        </div>
        <div class="footer-nav">
          <ul>
            <ul>
              <li><a href="aboutus.html">About us</a></li>
              <li><a href="privacy.html">Privacy Policy</a></li>
              <li><a href="refunds.html">Refunds & Exchanges</a></li>
              <li><a href="termsofservice.html">Terms of Service</a></li>
            </ul>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p style="color: #a02d8a">
          &copy; 2024 All rights reserved by OCinema
        </p>
      </div>
    </footer>
  </body>
</html>