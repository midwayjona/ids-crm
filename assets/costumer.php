<!-- relative root -->
<?php
session_start();
$path = '';
include $path.'../includes/dbh.inc.php';
include $path.'../includes/bypass_security.php';
include $path.'header.php';

if (isset($_POST['submit-costumer-edit'])) {
  $nit = $_POST['nit'];

  ?>
  
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $path ?>assets/css/style.css">
    <script async="" src="//www.google-analytics.com/analytics.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <script src="js/utils.js"></script>
    
  </head>
  <!-- header -->
  
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse show navbar-fixed-left" style="">
        <div class="sidebar-sticky pt-3"  id="v-pills-tab" role="tablist" aria-orientation="vertical">
  
          <ul class="nav flex-column">
            <li class="nav-item">
  
              <a class="nav-link active" href="cpanel.php" role="tab" aria-controls="v-pills-home" aria-selected="true">
                <svg class="svg-icon" viewBox="0 0 20 20" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                  <path d="M18.121,9.88l-7.832-7.836c-0.155-0.158-0.428-0.155-0.584,0L1.842,9.913c-0.262,0.263-0.073,0.705,0.292,0.705h2.069v7.042c0,0.227,0.187,0.414,0.414,0.414h3.725c0.228,0,0.414-0.188,0.414-0.414v-3.313h2.483v3.313c0,0.227,0.187,0.414,0.413,0.414h3.726c0.229,0,0.414-0.188,0.414-0.414v-7.042h2.068h0.004C18.331,10.617,18.389,10.146,18.121,9.88 M14.963,17.245h-2.896v-3.313c0-0.229-0.186-0.415-0.414-0.415H8.342c-0.228,0-0.414,0.187-0.414,0.415v3.313H5.032v-6.628h9.931V17.245z M3.133,9.79l6.864-6.868l6.867,6.868H3.133z"></path>
                </svg>
                Summary
              </a>
  
              <!-- <a class="nav-link active" href="cpanel.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                  <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Dashbodard <span class="sr-only">(current)</span>
              </a> -->
            </li>
  
          </ul>
  
  
        
        </div>
      </nav>
  
  
  
  
  
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
          <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
          </div>
          <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
          </div>
        </div>
  
  
  
  
        <div class="d-flex justify-content-between dash-chart-main flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Profile</h1>
  
  
  
  
        </div>
  
        
  
        <!-- FUNCTIONALITY -->
  
  
  
          <div class="tab-content" id="v-pills-tabContent">
  
  
  
            <!-- HOME TAB -->
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
  
  
              <div class="container">
  
              <?php
              $sql = 'SELECT * FROM costumer WHERE nit = :nit';
              $stmt = $conn->prepare($sql);
              $stmt->execute(['nit' => $nit]);
              $result = $stmt->fetchObject();
              ?>
  
                <div class="mb-4"></div> <!-- spacer -->
  
                <div class="col-lg-12 col-md-8">
                <form class="form-signin"  action="<?php echo $path ?>includes/admin_costumer_update.inc.php" method="post">
  
                  <div class="text-center mb-4">
                    <svg class="svg-icon" viewBox="0 0 20 20" width="72" height="72" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                      <path fill="none" d="M10,10.9c2.373,0,4.303-1.932,4.303-4.306c0-2.372-1.93-4.302-4.303-4.302S5.696,4.223,5.696,6.594C5.696,8.969,7.627,10.9,10,10.9z M10,3.331c1.801,0,3.266,1.463,3.266,3.263c0,1.802-1.465,3.267-3.266,3.267c-1.8,0-3.265-1.465-3.265-3.267C6.735,4.794,8.2,3.331,10,3.331z"></path>
                      <path fill="none" d="M10,12.503c-4.418,0-7.878,2.058-7.878,4.685c0,0.288,0.231,0.52,0.52,0.52c0.287,0,0.519-0.231,0.519-0.52c0-1.976,3.132-3.646,6.84-3.646c3.707,0,6.838,1.671,6.838,3.646c0,0.288,0.234,0.52,0.521,0.52s0.52-0.231,0.52-0.52C17.879,14.561,14.418,12.503,10,12.503z"></path>
                    </svg>
                    <div class="mb-4"></div> <!-- spacer -->
                    <h6>Review costumer <b>information</b>.</h6>
                  </div>
                  <div class="mb-5"></div>
  
                  <div class="form-label-group mb-3">
                    <label for="input_nit">Taxpayer Identification Number</label>
                    <input type="text" name="nit" id="input_nit" value="<?php echo $result->nit ?>" class="form-control tin"  required="" readonly>
                  </div>
                  
                  <div class="form-label-group mb-3">
                    <label for="input_cid">Identification Number</label>
                    <input type="text" name="dpi" id="input_cid" value="<?php echo $result->dpi ?>" class="form-control userid"  required="" readonly>
                  </div>
  
                  <div class="form-label-group mb-3">
                    <label for="input_cname">Name</label>
                    <input type="text" name="cname" id="input_cname" value="<?php echo $result->cname ?>" class="form-control"  required="">
                  </div>
  
                  <div class="form-label-group mb-3">
                    <label for="input_ccompany">Company</label>
                    <input type="text" name="ccompany" id="input_ccompany" value="<?php echo $result->ccompany ?>" class="form-control"  required="">
                  </div>
  
                  <div class="form-label-group mb-3">
                    <label for="input_cdob">Date of Birth</label>
                    <input type="date" name="cdob" id="input_cdob" value="<?php echo $result->cdob ?>" class="form-control">
                  </div>
  
                  <div class="form-label-group mb-3">
                    <label for="input_cphone">Phone</label>
                    <input type="text" name="cphone" id="input_cphone" value="<?php echo $result->cphone ?>" class="form-control phone">
                  </div>
  
                  <div class="form-label-group mb-3">
                    <label for="input_cemail">Email</label>
                    <input type="text" name="cemail" id="input_cemail" value="<?php echo $result->cemail ?>" class="form-control">
                  </div>
  
                  <div class="form-label-group mb-3">
                    <label for="input_caddress">Address</label>
                    <textarea class="form-control" name="caddress" id =input_caddress" rows="4" required><?php echo $result->caddress ?></textarea>
                  </div>
  
                  <div class="mb-4"></div>
                <button type="reset" class="btn btn-md btn-dark">Reset</button>

                <div class="mb-4"></div>
                <button class="btn btn-lg btn-outline-dark btn-block" type="submit" name="admin-costumer-update-submit">Submit</button>
                </form>
                <!-- DELETE BUTTON -->
                <form class="form-signin"  action="<?php echo $path ?>includes/admin_costumer_delete.inc.php" method="post">
                  <input type="hidden" name="nit" id="input_nit" value="<?php echo $result->nit ?>">
                  <button class="btn btn-sm btn btn-outline-danger btn-block" type="submit" name="admin-costumer-delete-submit">DELETE</button>
                </form>
              </div>
                
  
                <!-- old table -->
              </div>
  
            </div>
  
          </div>
          <!-- footer -->
          <?php require __DIR__."/footer.php"; ?>
        </main>
      </div>
    </div>

<?php
} else {
  header("Location: cpanel.php");
  exit();
}


