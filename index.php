<?php 
    require "header.php"; 
    session_start();
    if (!isset($_SESSION["login"])) {
        $_SESSION["login"] = 1;
    } 
?>
<body>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/about-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>AirBenders' Blog</h1>
                        <hr class="small">
                        <span class="subheading">This is what I do.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

<!-- page start-->
<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Login</a></li>
    <li><a data-toggle="tab" href="#menu1">Register</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Login</h3>
            <div id="contact-area">
                <form method="post" name="formPost" action="user_helper.php" onsubmit="return validate();">
                    <input type="text" placeholder="Username" name="username" id="username" value='' required>
                    <input type="password" placeholder="Password" name="password" id="password" value='' required>

                    <input type="submit" name="submit" value="Login" class="submit-button">
                </form>
            </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Register</h3>
            <div id="contact-area">
                <form method="post" name="formPost" action="user_helper.php" onsubmit="return validate();">

                    <input type="text" placeholder="Username"  name="username" id="username" value='' required>
                    <input type="password" placeholder="Password"  name="password" id="password" value='' required>
                    <input type="email" placeholder="Email" name="email" id="email" required>

                    <input type="submit" name="submit" value="Register" class="submit-button">
                </form>
            </div>
    </div>
  </div>
</div>

</body>

    <hr>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
