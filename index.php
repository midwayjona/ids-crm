<!--

 -->

<?php require __DIR__."/assets/header.php" ?>


<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-7 mx-auto">
      <?php require __DIR__."/assets/filler.php";?>

      ASDASDASD
      ASDASDASD

      <?php
      echo $hashedPwd = password_hash('admin123', PASSWORD_DEFAULT);
      ?>

    </div>
  </div>
</div>

<?php require __DIR__."/assets/footer.php"; ?>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!-- Main.js -->
<script href="<?php $path ?>assets/js/main.js" crossorigin="anonymous"></script>
<script href="<?php $path ?>assets/js/Cleave.js" crossorigin="anonymous"></script>
<!-- end -->
