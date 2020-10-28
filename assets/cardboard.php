<!-- relative root -->
<?php
session_start();
$path = '';
include $path.'../includes/dbh.inc.php';
include $path.'../includes/bypass_security.php';
include $path.'header.php';

if (isset($_POST['form-sale-submit'])) {
  // code...
}

$invoice_id = $_POST['invoice_id'];

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

            <a class="nav-link active" href="dashboard.php" role="tab" aria-controls="v-pills-home" aria-selected="true">
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

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
              <circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line>
              <line x1="8" y1="12" x2="16" y2="12"></line>
            </svg>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
                <polyline points="10 9 9 9 8 9"></polyline>
              </svg>
              current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
              last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
              taxable income
            </a>
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
        <h1 class="h2">Invoice</h1>



        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-dark mx-1">Share</button>
            <button type="button" class="btn btn-sm btn-outline-dark mx-1">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-dark dropdown-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
              <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
              <line x1="16" y1="2" x2="16" y2="6"></line>
              <line x1="8" y1="2" x2="8" y2="6"></line>
              <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
            This week
          </button>
        </div>

      </div>

      <div class="col-md-4 mx-auto">
        <?php
        if(isset($_GET['status'])) {
          $status = $_GET['status'];
          if ($status == 

          'ID_NOT_FOUND') {
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
              <hr>
              You can close this alert now.
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
            <div class="alert alert-warning alert-dismissible show fade my-4" id="signupAlert" role="alert">
              <h4 class="alert-heading">Warning</h4>
              <hr>
              📌 <strong>Holy guacamole!</strong> a costumer with the same email already exist, check costumer records.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
          } elseif ($status == 'ID_EXIST') {
            // code...
            echo '
            <div class="alert alert-warning alert-dismissible show fade my-4" id="signupAlert" role="alert">
              <h4 class="alert-heading">Warning</h4>
              <hr>
              📌 <strong>Holy guacamole!</strong> a costumer with the same id already exist, check costumer records.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
          }elseif ($status == 'SUCCESS') {
            // code...
            echo '
            <div class="alert alert-success alert-dismissible show fade my-4" id="signupAlert" role="alert">
              <h4 class="alert-heading">Well done!</h4>
              <hr>
              ✔️ credentials stored.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
          }
        }
        ?>
      </div>

      <!-- FUNCTIONALITY -->
      <?php
      function FormatCreditCard($cc)
      {
        // Clean out extra data that might be in the cc
        $cc = str_replace(array('-',' '),'',$cc);
        // Get the CC Length
        $cc_length = strlen($cc);
        // Initialize the new credit card to contian the last four digits
        $newCreditCard = substr($cc,-4);
        // Walk backwards through the credit card number and add a dash after every fourth digit
        for($i=$cc_length-5;$i>=0;$i--){
          // If on the fourth character add a dash
          if((($i+1)-$cc_length)%4 == 0){
            $newCreditCard = '-'.$newCreditCard;
          }
          // Add the current character to the new credit card
          $newCreditCard = $cc[$i].$newCreditCard;
        }
        // Return the formatted credit card number
        return $newCreditCard;

      }
      ?>


        <div class="tab-content" id="v-pills-tabContent">



          <!-- HOME TAB -->
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <div class="row">
              <div class="col-lg-3">

                <!-- <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="2330" height="983" style="display: block; height: 787px; width: 1864px;"></canvas> -->
              		<!-- <canvas id="myChart" style="display: block; width: 452px; height: 226px;" width="452" height="226" class="chartjs-render-monitor"></canvas> -->

              </div><!-- /.col-lg-4 -->

              <div class="col-lg-5">
                <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart2" width="2330" height="983" style="display: block; height: 787px; width: 1864px;"></canvas>

              </div><!-- /.col-lg-4 -->
              <div class="col-lg-3">

              </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->

            <div class="container">

              <?php
              $sql = 'SELECT * FROM sale WHERE invoice_id = :invoice_id';
              $stmt = $conn->prepare($sql);
              $stmt->execute(['invoice_id' => $invoice_id]);
              $result = $stmt->fetchObject();

               ?>


              <div class="mb-5"></div> <!-- spacer -->
              <h3><strong>Information</strong></h3>
              <div class="mb-4"></div> <!-- spacer -->

              <div class="row">
                <div class="col-lg-6">
                  <h1 class="h4">Invoice Number <b><?php echo $invoice_id ?></b></h1>
                  <h4 class="h5">Store <strong><?php echo $result->store_id ?></strong></h4>
                  <h1 class="h5">Created By <b><?php echo $result->created_by ?></b></h1>
                  <h1 class="h5">Date <b><?php echo date("d M y", strtotime($result->created_at)) ?></b></h1>
                  <h4 class="h5">Status <strong><?php echo $result->sstatus ?></strong></h4>
                  <h4 class="h5">Delivered? <strong><?php 
                  if ($is_delivery) {
                    echo 'Delivered';
                  } else {
                    echo 'Not Yet';
                  }
                  ?></strong></h4>
                </div><!-- /.col-lg-4 -->

                <div class="col-lg-6">
                  <h4 class="h4">Updated By <strong><?php echo $result->updated_by ?></strong></h4>
                  <h4 class="h5">Update Date <strong><?php echo date("d M y", strtotime($result->updated_at)) ?></strong></h4>
                  <h4 class="h5">Store <strong>Q <?php echo sprintf("%1\$.2f",strval($minPay)); ?></strong></h4>
                </div><!-- /.col-lg-4 -->
              </div><!-- /.row -->


              <div class="mb-5"></div> <!-- spacer -->
              <h4><strong>Transaction</strong></h4>
              <div class="mb-4"></div> <!-- spacer -->


              <div class="table-responsive">
                <table class="table table-hover">

                  <tbody>
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Total</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Grand Total</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Invoice</th>
                      </tr>
                    </thead>
                    <?php

                    // SELECT COSTUMER
                        $orgDate = $result->created_at;
                        $newDate = date("M d", strtotime($orgDate));
                        echo '
                        <tr>
                          <td>'.sprintf("Q %1\$.2f", strval($result->total)).'</td>
                          <td>'.sprintf("Q %1\$.2f", strval($result->total_discount)).'</td>
                          <td><b>'.sprintf("Q %1\$.2f", strval($result->total_sale)).'</b></td>
                          <td></td>
                          <td></td>
                          <td scope="row">
                            <form class="form-sale-submit"  action="cardboard.php" method="post">
                              <input type="hidden" name="invoice_id" value="'.$result->invoice_id.'" id="invoice_id" class="form-control">
                              <button class="btn" type="submit" name="delete-costumer-submit" title="Credit Card">
                                <svg class="svg-icon" viewBox="0 0 25 25" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M4.317,16.411c-1.423-1.423-1.423-3.737,0-5.16l8.075-7.984c0.994-0.996,2.613-0.996,3.611,0.001C17,4.264,17,5.884,16.004,6.88l-8.075,7.984c-0.568,0.568-1.493,0.569-2.063-0.001c-0.569-0.569-0.569-1.495,0-2.064L9.93,8.828c0.145-0.141,0.376-0.139,0.517,0.005c0.141,0.144,0.139,0.375-0.006,0.516l-4.062,3.968c-0.282,0.282-0.282,0.745,0.003,1.03c0.285,0.284,0.747,0.284,1.032,0l8.074-7.985c0.711-0.71,0.711-1.868-0.002-2.579c-0.711-0.712-1.867-0.712-2.58,0l-8.074,7.984c-1.137,1.137-1.137,2.988,0.001,4.127c1.14,1.14,2.989,1.14,4.129,0l6.989-6.896c0.143-0.142,0.375-0.14,0.516,0.003c0.143,0.143,0.141,0.374-0.002,0.516l-6.988,6.895C8.054,17.836,5.743,17.836,4.317,16.411"></path>
                                </svg>
                              </button>
                            </form>
                          </td>
                        </tr>



                      ';
                     ?>

                  </tbody>
                </table>
                <div class="mb-5"></div> <!-- spacer -->

                

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

<script>
Chart.defaults.global.legend.display = false;




<?php
$sql = 'SELECT * FROM transactions WHERE cnumber = :cnumber';
$stmt = $conn->prepare($sql);
$stmt->execute(['cnumber' => $cnumber]);
$result = $stmt->fetchAll();
// Cats
$food=0;$cloth=0;$tools=0;$home=0;
foreach ($result as $result) {
  // code...
  if ($result->tcat ==0) {$food ++;}
  elseif ($result->tcat ==1) {$cloth ++;}
  elseif ($result->tcat ==2) {$tools ++;}
  elseif ($result->tcat ==3) {$home ++;}
}

 ?>
var ctxi = document.getElementById('myChart2').getContext('2d');
var chart = new Chart(ctxi, {
  // The type of chart we want to create
  type: 'bar',
  data: {
    datasets: [{
      data: [
        <?php echo '3200' ?>,
        <?php echo '800' ?>,
        <?php echo '2400' ?>,
      ],
      backgroundColor: [
        window.chartColors.blue,
        window.chartColors.red,
        window.chartColors.green,
      ],
      borderWidth: 1,
      label: ' '
    }],
    labels: [
      'Total',
      'Discount',
      'Grand Total'
    ]
  },
  options: {
    legend: {
      display: false
    },
    tooltips: {
      callbacks: {
        label: function(tooltipItem) {
          return tooltipItem.yLabel;
        }
      }
    },
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    },
    responsive: true,
    legend: {
      position: 'right',
    },
    title: {
      display: true,
      text: 'Total Breakdown'
    },
    animation: {
      duration: 3000,
      animateScale: true,
      animateRotate: true
    }
  }
});

      	</script>
