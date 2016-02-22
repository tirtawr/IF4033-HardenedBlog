<?php
    session_start();
if ($_SESSION["user"] == null){
  header('location:index.php');
}
require "db_handler.php"; 
  if (!isset($_GET['post_id'])){
    throw new Exception("Missing parameter: id");
  }
    $post = getPost($_GET['post_id']);
?>
<?php require "header.php"; ?>
<body>
    <?php require "navigation.php"; ?>
    
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-repeat: no-repeat;background-attachment: fixed; background-position: top;background-image: url('<?=$post['image_path'];?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading" style="background-color:hsla(222,100%,50%,0.3);">
                        <h1><?=$post['post_title'];?></h1>
                        <span class="meta">Posted by <a href="#"><?=$post['username'];?></a> on <?=$post['post_date'];?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <p><?=$post['post_content'];?></p>
                </div>
            </div>
        </div>
    </article>

    <hr>

     <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>Have Toughts with this post? spread the comment!</p>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                <form method="post" action="#" name="komentar">
                    <input type="hidden" name="post_id" value="<?=$post['post_id'];?>"/>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="nama" id="nama" required>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Email Address" name="email" id="email" required>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Comment</label>
                            <textarea rows="5" class="form-control" placeholder="Message" name="komentar" id="komentar" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <input type="button" name="submit" value="Kirim" class="submit-button btn btn-default" onclick="addComment(<?=$post['post_id'];?>)">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
     <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <ul class="art-list-body" id='comments'>
                    <p>List Komentar</p>
                
                </ul>
            </div>
        </div>
    </div>
<?php require "footer.php"; ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>
    <script type="text/javascript">
    


  function getComments(post_id){
    http = new XMLHttpRequest();
    http.open("GET","get_comments.php?post_id="+post_id,true);

    http.onreadystatechange = function(){
      if (http.readyState == 4 && http.status == 200){
        console.log(http.responseText);
        document.getElementById('comments').innerHTML = http.responseText;
      }
    }
    http.send();
  }

  function addComment(post_id){
    //alert("oy");
    if(validateEmail()){
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST","add_comment.php",true);
       
        var form  = "";//new FormData();
        form += "post_id=" + document.forms['komentar']['post_id'].value;
        form += "&name=" + document.forms['komentar']['nama'].value;
        form += "&email=" + document.forms['komentar']['email'].value;
        form += "&post_comment=" + document.forms['komentar']['komentar'].value;
        //alert(form);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(form);

        xmlhttp.onreadystatechange = function (){
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                alert("Udah neh")
              getComments(post_id);}
        }
    }
     
  }

  function validateEmail(){
    var x = document.forms['komentar']['email'].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
      alert("Emailnya yang bener dong");
      return false;
    } else {
      return true;
    }
  }

  getComments(<?=$post['post_id'];?>);

</script>
</body>

</html>
