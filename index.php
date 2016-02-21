<?php require "header.php"; session_start(); if ($_SESSION["login"] == null) {$_SESSION["login"] = 1;} echo $_SESSION["login"]; ?>

<div class="wrapper">
<article class="art simple post">
 	 <header class="art-header">
        <div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
            <h2 class="art-title">Aangs' Blog</h2>
            <p class="art-subtitle"></p>
        </div>
    </header>
 	<div class="art-body">
        <div class="art-body-inner">
 			<div id="contact-area">
                <form method="post" name="formPost" action="user_helper.php" onsubmit="return validate();">
                    <label for="username">username:</label>
                    <input type="text" name="username" id="username" value='' required>

                    <label for="Password">Password:</label>
                    <input type="password" name="password" id="password" value='' required>

                    <input type="submit" name="submit" value="Login" class="submit-button">
                </form>
            </div>
            
            <div id="contact-area">
                <form method="post" name="formPost" action="user_helper.php" onsubmit="return validate();">
                  	<label for="username">username:</label>
                    <input type="text" name="username" id="username" value='' required>

                    <label for="Password">Password:</label>
                    <input type="password" name="password" id="password" value='' required>

                    <label for="Email">Email:</label>
                    <input type="email" name="email" id="email" required>

                    <input type="submit" name="submit" value="Daftar" class="submit-button">
                </form>
            </div>
        </div>
    </div>
</article>
</div>