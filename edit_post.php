<?php require "header.php"; ?>

<?php
    session_start();
if ($_SESSION["user"] == null){
  header('location:index.php');
}
    require "db_handler.php";
  if (!isset($_GET['post_id'])){
    throw new Exception("Missing parameter: post_id");
  }
    $post = getPost($_GET['post_id']);
?>

<body>

   <?php require "navigation.php"; ?>


    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-repeat: no-repeat;background-attachment: fixed; background-position: top;background-image: url('<?=$post['image_path'];?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>Edit Post</h1>
                        <hr class="small">
                        <span class="subheading">Changing Mind? Just Edit it.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <form method="post" action="edit_post_helper.php" onsubmit="return validate();" enctype="multipart/form-data">
                    <div class="row control-group">
                        <input type="hidden" name="Id" value='<?=$post['post_id'];?>'>
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Title" name="Judul" id="Judul" value='<?=$post['post_title'];?>'required>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" placeholder="Date" type="date" name="Tanggal" id="Tanggal" value='<?=$post['post_date'];?>'required>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Content</label>
                            <textarea rows="5" class="form-control" placeholder="Content" name="Konten" id="Konten" required><?=$post['post_content'];?></textarea>
                        </div>
                    </div>
                    <div class="row control-group">
                        <label>Picture (optional)</label>
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Picture</label>
                            <input rows="5" class="form-control" placeholder="Picture" type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" name="submit" value="Simpan" class="btn btn-default">Edit</button>
                        </div>
                    </div>
                </form>
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
    <script>
  
    Date.prototype.lessThan = function (d) {
      if (this.getFullYear() != d.getFullYear()) {
        return this.getFullYear() < d.getFullYear();
      }
      if (this.getMonth() != d.getMonth()) {
        return this.getMonth() < d.getMonth();
      }
      return this.getDate() < d.getDate();
    }

    function validate(){
        tanggal = document.getElementById("Tanggal");
        dateInput = new Date(tanggal.value);
        if (dateInput.lessThan(new Date())) {
          alert("Tanggalnya masih salah bro");
          tanggal.focus();
          return false;
        }else{
          return true;
        }
      
    }

    </script>
</body>

</html>
