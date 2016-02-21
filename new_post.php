<?php require "header.php"; session_start();
if ($_SESSION["user"] == null){
  header('location:index.php');
}?>

<body class="default">
<div class="wrapper">

<nav class="nav">
    <a style="border:none;" id="logo" href="home.php"><img id="aang" src="Aang.png" /></a>
    <ul class="nav-primary">
        <div id="homediv">
        <li><a id="home">Home</a></li>
            
        <a href="new_post.php"><img id="addico" src="plus.png" /></a>
     </div>
    </ul>
    
</nav>

<article class="art simple post">
    
    
    <h2 class="art-title" style="margin-bottom:40px">-</h2>

    <div class="art-body">
        <div class="art-body-inner">
            <h2>Tambah Post</h2>

            <div id="contact-area">
                <form method="post" name="formPost" action="new_post_helper.php" onsubmit="return validate();" enctype="multipart/form-data">
                    <label for="Judul">Judul:</label>
                    <input type="text" name="Judul" id="Judul" value='' required>

                    <label for="Tanggal">Tanggal:</label>
                    <input type="date" name="Tanggal" id="Tanggal" value='' required>
                    
                    <label for="Konten">Konten:</label><br>
                    <textarea name="Konten" rows="20" cols="20" id="Konten" required></textarea>

                    <label for="Konten">Gambar:</label><br>
                    <input type="file" name="fileToUpload" id="fileToUpload">

                    <input type="submit" name="submit" value="Simpan" class="submit-button">
                </form>
            </div>
        </div>
    </div>

</article>

<?php require "footer.php"; ?>

</div>

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

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript">
  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
      function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
      t=h.createElement(o);z=h.getElementsByTagName(o)[0];
      t.src='//www.google-analytics.com/analytics.js';
      z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
      ga('create',ga_ua);ga('send','pageview');
</script>

</body>

</html>