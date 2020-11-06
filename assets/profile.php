<!-- relative root -->
<?php
session_start();
$path = '';
include $path.'../includes/dbh.inc.php';
include $path.'../includes/bypass_security.php';
include $path.'header.php';

if (isset($_POST['form-invoice-submit'])) {
  // code...
}

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
            $sql = 'SELECT * FROM costumer WHERE nit = :nit';
            $stmt = $conn->prepare($sql);
            $stmt->execute(['nit' => $_SESSION['nit']]);
            $result = $stmt->fetchObject();
            ?>



              <div class="mb-5"></div> <!-- spacer -->
              <h3><strong><?php echo $result->cname ?></strong></h3>
              <div class="mb-4"></div> <!-- spacer -->

              <div class="row">
                <div class="col-lg-6">
                  <h1 class="h4">Company <b><?php echo $result->ccompany ?></b></h1>
                  <h1 class="h5">Phone <b><?php echo $result->cphone ?></b></h1>
                  <h1 class="h5">DOB <b><?php echo date("d M y", strtotime($result->cdob)) ?></b></h1>
                </div><!-- /.col-lg-4 -->

                <div class="col-lg-6">
                  <h4 class="h4">POS <strong><?php echo $pos_id ?></strong></h4>
                  <h4 class="h5">Warehouse <strong><?php echo $data->branch_id ?></strong></h4>
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
                        <th scope="col"></th>
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
                          <td>'.$product_arr->product_code.'</td>
                          <td>'.sprintf("Q %1\$.2f", strval($data->total_discount)).'</td>
                          <td><b>'.sprintf("Q %1\$.2f", strval($data->total_sale)).'</b></td>
                          <td></td>
                          <td></td>
                          <td scope="row">
                            <a style="color: black;" href="download.php?id='.$data->sale_id.'" target="_blank">
                              <svg class="svg-icon" viewBox="0 0 25 25" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M4.317,16.411c-1.423-1.423-1.423-3.737,0-5.16l8.075-7.984c0.994-0.996,2.613-0.996,3.611,0.001C17,4.264,17,5.884,16.004,6.88l-8.075,7.984c-0.568,0.568-1.493,0.569-2.063-0.001c-0.569-0.569-0.569-1.495,0-2.064L9.93,8.828c0.145-0.141,0.376-0.139,0.517,0.005c0.141,0.144,0.139,0.375-0.006,0.516l-4.062,3.968c-0.282,0.282-0.282,0.745,0.003,1.03c0.285,0.284,0.747,0.284,1.032,0l8.074-7.985c0.711-0.71,0.711-1.868-0.002-2.579c-0.711-0.712-1.867-0.712-2.58,0l-8.074,7.984c-1.137,1.137-1.137,2.988,0.001,4.127c1.14,1.14,2.989,1.14,4.129,0l6.989-6.896c0.143-0.142,0.375-0.14,0.516,0.003c0.143,0.143,0.141,0.374-0.002,0.516l-6.988,6.895C8.054,17.836,5.743,17.836,4.317,16.411"></path>
                              </svg>
                            </a>
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
        <?php echo $invoice_total ?>,
        <?php echo $invoice_discount ?>,
        <?php echo $invoice_total-$invoice_discount ?>,
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
$invoice_total