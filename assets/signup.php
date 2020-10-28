<!-- relative root -->
<?php
$path = '';
include __DIR__."/header.php";
?>


<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
</head>
<!-- header -->



<div class="container-form">
  <div class="row">
    <div class="col-lg-12 col-md-8">

      <form class="form-signin"  action="<?php echo $path ?>includes/signup.inc.php" method="post">
        <div class="text-center mb-4">
          <img class="mb-4" src="<?php echo $path ?>assets/media/logo.svg" alt="" width="72" height="72">
          <h1 class="h3 mb-3 font-weight-normal">Enroll in Mastercash Online®</h1>
          <h6>Easily manage your bank accounts and finances <b>online</b>.</h6>
            <?php
            if (isset($_GET['status'])) {
                $status = $_GET['status'];
                if ($status == 'ID_NOT_FOUND') {
                    // code...
                    echo '
                <div class="alert alert-danger alert-dismissible show fade my-4" id="signupAlert" role="alert">
                  📌 id was not found in our records, check id or contact support.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                ';
                } elseif ($status == 'ID_ASSIGNED') {
                    // code...
                    echo '
                <div class="alert alert-danger alert-dismissible show fade my-4" id="signupAlert" role="alert">
                  📌 this id already has an username assigned.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                ';
                } elseif ($status == 'USER_EXIST') {
                    // code...
                    echo '
                <div class="alert alert-danger alert-dismissible show fade my-4" id="signupAlert" role="alert">
                  📌 username already exist, please type a different one.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                ';
                } elseif ($status == 'EMAIL_EXIST') {
                    // code...
                    echo '
                <div class="alert alert-danger alert-dismissible show fade my-4" id="signupAlert" role="alert">
                  📌 email already exist in our records, please type a different one.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                ';
                } elseif ($status == 'SUCCESS') {
                    // code...
                    echo '
                <div class="alert alert-success alert-dismissible show fade my-4" id="signupAlert" role="alert">
                  ✔️ credentials saved, you can login.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                ';
                }
            }
            ?>
        </div>
        <!-- SPACER -->
        <div class="mb-5"></div>
        <div class="form-label-group mb-3">
          <label class="control-label" for="inputID">Identification Number</label>
          <input type="text" name="cid" id="inputID" class="form-control userid"  required="" >
        </div>

        <div class="form-label-group mb-3">
          <label for="inputUsername">Username</label>
          <input type="text" name="cuser" id="inputUsername" class="form-control" required="">

        </div>

        <div class="form-label-group mb-3">
          <label for="inputMail">Email</label>
          <input type="email" name="cmail" id="inputMail" class="form-control" required="">

        </div>

        <div class="form-label-group mb-3">
          <label for="cpwd">Password</label>
          <input type="password" name="cpwd" id="cpwd" class="form-control" required="" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.cpwd_vrfy.pattern = this.value;">

        </div>

        <div class="form-label-group mb-3">
          <label for="cpwd_vrfy">Password verification</label>
          <input type="password" name="cpwd_vrfy" id="cpwd_vrfy" class="form-control" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');">

        </div>
        <!-- SPACER -->
        <div class="mb-5"></div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="signup-submit">Enroll in Online Banking</button>



      </form>

      <p class="mt-5 mb-3 text-muted text-center">© 2020 Covid Commemorative Year</p>

    </div>
  </div>
</div>

<!-- footer -->
<?php require __DIR__."/footer.php"; ?>

<script type="text/javascript">
var cleave = new Cleave('.userid', {
    blocks: [4, 5, 4],
    delimiter: '-',
    numericOnly: true,
    swapHiddenInput: true
});
</script>
