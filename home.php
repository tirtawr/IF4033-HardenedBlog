<?php 
session_start();
if ($_SESSION["user"] == null){
  header('location:index.php');
}
require "header.php"; ?>
<?php
  require "db_handler.php";
  $posts = getPosts();
?>

<body>

    <?php require "navigation.php"; ?>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-repeat: no-repeat;background-attachment: fixed; background-position: top; background-image: url('img/be-the-leaf.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>AirBenders' Blog</h1>
                        <hr class="small">
                        <span class="subheading">What A World!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php foreach($posts as $post) : ?>
                <div class="post-preview">
                    <a href="post.php?post_id=<?=$post['post_id'];?>">
                        <h2 class="post-title">
                            <?=$post['post_title'];?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?=$post['post_content'];?>
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#"><?=$post['username'];?></a> on <?=$post['post_date'];?></p>
                    <a href="edit_post.php?post_id=<?=$post['post_id'];?>">Edit</a> | <a onclick="hapusPost(<?=$post['post_id'];?>)">Hapus</a>
                </div>
                <hr>
                <?php endforeach; ?>              
            </div>
        </div>
    </div>

    <hr>
<?php require "footer.php"; ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>
    <script type="text/javascript">
        function hapusPost(hea){
            if (confirm("Apakah Anda yakin menghapus post ini?")){
                window.location.href = "del_post.php?post_id=".concat(hea);
          
            }
        }
    </script>
</body>

</html>
