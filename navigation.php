<!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="Aang.png" style="margin-top: -10px; max-width: 10%"/></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php if(isset($_SESSION["user"])){ ?>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                    <li>
                        <a href="new_post.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> New Post</a>
                    </li>
                    <?php } else {?>
                    <li>
                        <a href="login.php"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Login/Register</a>
                    </li>
                    <?php } ?>
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>