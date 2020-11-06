<!-- relative root -->
<?php
date_default_timezone_set('America/Guatemala');
session_start();
$path = '';
include $path.'../includes/dbh.inc.php';
include $path.'../includes/bypass_security.php';
include $path.'header.php';
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

              <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
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
          <li class="nav-item">

            <a class="nav-link" id="v-pills-calendar-tab" data-toggle="pill" href="#v-pills-calendar" role="tab" aria-controls="v-pills-calendar" aria-selected="false">
              <svg class="svg-icon" viewBox="0 0 20 20" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
              <path d="M10,1.375c-3.17,0-5.75,2.548-5.75,5.682c0,6.685,5.259,11.276,5.483,11.469c0.152,0.132,0.382,0.132,0.534,0c0.224-0.193,5.481-4.784,5.483-11.469C15.75,3.923,13.171,1.375,10,1.375 M10,17.653c-1.064-1.024-4.929-5.127-4.929-10.596c0-2.68,2.212-4.861,4.929-4.861s4.929,2.181,4.929,4.861C14.927,12.518,11.063,16.627,10,17.653 M10,3.839c-1.815,0-3.286,1.47-3.286,3.286s1.47,3.286,3.286,3.286s3.286-1.47,3.286-3.286S11.815,3.839,10,3.839 M10,9.589c-1.359,0-2.464-1.105-2.464-2.464S8.641,4.661,10,4.661s2.464,1.105,2.464,2.464S11.359,9.589,10,9.589"></path>
              </svg>
              Schedule
            </a>

            <!-- <a class="nav-link" href="cpanel/costumer.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
              Customer
            </a> -->


          </li>

          <li class="nav-item">

            <a class="nav-link" id="v-pills-ticket-tab" data-toggle="pill" href="#v-pills-ticket" role="tab" aria-controls="v-pills-ticket" aria-selected="false">
              <svg class="svg-icon" viewBox="0 0 20 20" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                <path d="M17.218,2.268L2.477,8.388C2.13,8.535,2.164,9.05,2.542,9.134L9.33,10.67l1.535,6.787c0.083,0.377,0.602,0.415,0.745,0.065l6.123-14.74C17.866,2.46,17.539,2.134,17.218,2.268 M3.92,8.641l11.772-4.89L9.535,9.909L3.92,8.641z M11.358,16.078l-1.268-5.613l6.157-6.157L11.358,16.078z"></path>
              </svg>
              Support
            </a>

            <!-- <a class="nav-link" href="cpanel/costumer.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
              Customer
            </a> -->


          </li>



          <li class="nav-item">

            <a class="nav-link" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                <polyline points="2 17 12 22 22 17"></polyline>
                <polyline points="2 12 12 17 22 12"></polyline>
              </svg>
              Integrations
            </a>

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
              card settlement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
              loans
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
        <h1 class="h6">Dashboard</h1>



        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <!-- <button type="button" class="btn btn-sm btn-outline-dark mx-1">Share</button>
            <button type="button" class="btn btn-sm btn-outline-dark mx-1">Export</button> -->
          </div>
          <!-- <button type="button" class="btn btn-sm btn-outline-dark dropdown-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
              <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
              <line x1="16" y1="2" x2="16" y2="6"></line>
              <line x1="8" y1="2" x2="8" y2="6"></line>
              <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
            This week
          </button> -->
        </div>

      </div>

      <div class="col-md-4 mx-auto">
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
            } elseif ($status == 'S101') {
                // code...
                echo '
            <div class="alert alert-success alert-dismissible show fade my-4" id="signupAlert" role="alert">
              <h4 class="alert-heading">Ticket submitted!</h4>
              <hr>
              ✔️ agent will get back to you soon.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
            }
        }
        ?>
      </div>



        <div class="tab-content" id="v-pills-tabContent">

          <!-- HOME TAB -->
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

            <div class="mb-5"></div> <!-- spacer -->
            <div class="container">



              <div Id="wrapper">
                  <section>
                      <ul id="a">
                        <li>
                            <img src="<?php echo $path ?>assets/media/avatar.png" class="bd-placeholder-img rounded-circle" width="160" height="160">
                            <!-- Wrapped into div -->
                            <div class="details">
                              <!-- PROFILE PAGE -->
                              <form class="form-profile-submit"  action="profile.php" method="post">
                                <input type="hidden" name="nit" value="<?php echo $_SESSION['nit']; ?>" id="nit" class="form-control">
                                <button class="btn btn-sm" type="submit" name="profile-submit">
                                  <h3><strong><?php echo $_SESSION['cname']; ?></strong></h3>
                                </button>
                              </form>
                              <h5><?php echo $_SESSION['ccompany']; ?></h5>
                              <div class="mb-3"></div> <!-- spacer -->
                              <h6><span style="font-size: .75rem;text-transform: uppercase;">TIN </span><b><?php echo $_SESSION['nit']; ?></b></h6>
                              <h6><span style="font-size: .75rem;text-transform: uppercase;">EMAIL </span><b><?php echo $_SESSION['cemail']; ?></b></h6>
                              <h6><span style="font-size: .75rem;text-transform: uppercase;">PHONE </span><b><?php echo $_SESSION['cphone']; ?></b></h6>
                            </div>

                        
                        </li>
                      </ul>
                    </section>

                    <!-- Progress Bar -->
                    <div class="container">

                    <h3><strong>
                      <?php
                      // FETCH CURRENT STATUS
                      $sql = 'SELECT * FROM cstatus WHERE nit = :nit';
                      $stmt = $conn->prepare($sql);
                      $stmt->execute(['nit' => $_SESSION['nit']]);
                      $result = $stmt->fetchObject();
                      
                      $pqd = $result->pqd;
                      $pqs = $result->pqs;
                      $cstatus = $result->cstatus;

                      switch ($cstatus) {
                        case 0:
                            echo '<p style="color:#b08D57;display:inline-block;"><b>Bronze</b></p>';
                            break;
                        case 1:
                            echo '<p style="color:#555652;display:inline-block;"><b>Silver</b></p>';
                            break;
                        case 2:
                            echo '<p style="color:#DAA520;display:inline-block;"><b>Gold</b></p>';
                            break;
                        case 3:
                            echo '<p style="color:#aaa9ae;display:inline-block;"><b>Platinum</b></p>';
                            break;
                        case 4:
                            echo '
                            <p style="color:#70d1f4"><b>Silver
                              Diamond
                            </b></p>';
                            break;
                          }
                      ?>
                    
                    
                    Member</strong></h3>
                    <h5>Progress to reach next tier</h5>
                      <div class="row">
                      
                        <div class="col-sm">
                          <!-- One of three columns -->
                        </div>

                        <div class="row">
                        <div class="col-sm">
                        <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="2330" height="983" style="display: block; height: 787px; width: 1864px;"></canvas>
                        <h5>Premier Qualifying Dollars (<b><a href=" " title="You earn premier qualifying dollars for the grand total of evert invoice under you account.">PQD</a></b>)</h5>
                        </div>

                        <div class="col-sm">
                        <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart2" width="2330" height="983" style="display: block; height: 787px; width: 1864px;"></canvas>
                        <h5>Premier Qualifying Sales (<b><a href=" " title="You earn premier qualifying sales for every sale under you account.">PQS</a></b>)</h5>
                        </div>
                        </div>

                        <div class="col-sm">

                       


             


                        </div>
                        <div class="col-sm">
                          <!-- One of three columns -->
                        </div>
                      </div>
                    </div>


                </div>


              <div class="mb-5"></div> <!-- spacer -->
              <h4><strong>Recent Transactions</strong></h4>
              <div class="mb-4"></div> <!-- spacer -->
              <div class="table-responsive">
                <table class="table table-hover">

                  <tbody>
                    <thead class="thead-dark">
                      <tr>
                      <th scope="col">Invoice Number</th>
                        <th scope="col">Date</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Discount</th>
                        <th scope="col">Grand Total</th>
                      </tr>
                    </thead>
                    <?php

                    // MEMBER STATUS PARAM
                    $pqd = 0;
                    $pqs = 0;

                    $url = 'https://ccvi-distributors-project.herokuapp.com/v1/pos/sales/customer/';
                    $token = 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyaWQiOjIwLCJ1c2VybmFtZSI6InNlcnZpY2VhY2NvdW50IiwiZW1haWwiOiIiLCJmdWxsbmFtZSI6IkN1ZW50YSBkZSBTZXJ2aWNpbyBHbG9iYWwiLCJhcHBsaWNhdGlvbnMiOlt7Im5hbWUiOiJzZXJ2aWNlbm9kZSIsIm5vZGVpZCI6MTAsInJpZ2h0cyI6eyJncm91cHMiOltdLCJyb2xlcyI6WyJST0xFX0lOVEVSTkFMX1NFUlZJQ0UiXSwicGVybWlzc2lvbnMiOltdfX1dLCJpYXQiOjE2MDQwNDgwNDEsImV4cCI6MTYwNjY0MDA0MSwiYXVkIjoiaHR0cDovL2luZ2VuaWVyaWFkZXNvZnR3YXJlMjAyMC5jb20iLCJpc3MiOiJTdXBlciBFUlAgMzAwMCIsInN1YiI6InVzZXJAZXJwMzAwMC5jb20ifQ.UaBRLPU323jkiNaKX0sdS_SWnZSbpUQJVKYOsGjLVYkMZEC5wzz0-KFZEuqOiCbgJcs13tRxTI9IJL7UfAKWVQ';

                    $request_url = $url.$_SESSION['nit'];

                    $curl = curl_init($request_url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_HTTPHEADER, [
                      'Authorization: '.$token,
                      'Content-Type: application/json'
                    ]);
                    $response = curl_exec($curl);
                    curl_close($curl);
                    $data = json_decode($response);

                    
                    
                    foreach($data as $sale) {
                      $pqs++;
                      $pqd = $sale->total_sale + $pqd - $sale->total_discount;
                      $orgDate = $row->created_at;
                      $newDate = date("M d", strtotime($orgDate));
                      echo '
                      <tr>
                        <td scope="row">
                          <form class="form-invoice-submit"  action="cardboard.php" method="post">
                            <input type="hidden" name="invoice_id" value="'.$sale->sale_id.'" id="invoice_id" class="form-control">
                            <input type="hidden" name="pos_id" value="1" id="pos_id" class="form-control">
                            <button class="btn" type="submit" name="delete-costumer-submit" title="Invoice Number">
                              <svg class="svg-icon" viewBox="0 0 25 25" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                              <path d="M12.522,10.4l-3.559,3.562c-0.172,0.173-0.451,0.176-0.625,0c-0.173-0.173-0.173-0.451,0-0.624l3.248-3.25L8.161,6.662c-0.173-0.173-0.173-0.452,0-0.624c0.172-0.175,0.451-0.175,0.624,0l3.738,3.736C12.695,9.947,12.695,10.228,12.522,10.4 M18.406,10c0,4.644-3.764,8.406-8.406,8.406c-4.644,0-8.406-3.763-8.406-8.406S5.356,1.594,10,1.594C14.643,1.594,18.406,5.356,18.406,10M17.521,10c0-4.148-3.374-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.147,17.521,17.521,14.147,17.521,10"></path>
                              </svg>
                              <b>'.sprintf("%010s", $sale->sale_id).'</b>
                            </button>
                          </form>
                        </td>


                        <td>'.$newDate.'</td>
                        <td></td>
                        <td></td>
                        <td>'.sprintf("Q %1\$.2f", strval($sale->total_discount)).'</td>
                        <td><b>'.sprintf("Q %1\$.2f", strval($sale->total_sale)).'</b></td>

                      </tr>
                    ';
                    }        


                     ?>

                  </tbody>
                </table>
                <div class="mb-5"></div> <!-- spacer -->

                

              </div>
            </div>





          </div>



          <!-- TICKET TAB -->
          <div class="tab-pane fade" id="v-pills-ticket" role="tabpanel" aria-labelledby="v-pills-ticket-tab">
            <div class="col-lg-12 col-md-8">
            <div class="mb-5"></div> <!-- spacer -->
            <h3>Support Center</h3>

            <!-- TICKET BUTTON -->
            <div class="mb-5"></div> <!-- spacer -->
            <div class="col-lg-12 col-md-6">
              <form class="form"  action="create_ticket.php" method="post">
                <div class="mb-4"></div>
                <button class="btn btn-outline-dark" type="submit" name="create-ticket-submit">Create Ticket</button>
              </form>
            </div>
            <div class="mb-5"></div> <!-- spacer -->
            <!-- END TICKET BUTTON -->


            <div class="table-responsive">
                <table class="table table-hover">

                  <tbody>
                    <thead class="thead-dark">
                      <tr>
                      <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <?php

                    $nit = $_SESSION['nit'];
                    $sql = 'SELECT * FROM ticket WHERE nit = :nit ORDER BY tstatus ASC, created DESC';
                    $stmt = $conn->prepare($sql);
                    $stmt->execute(['nit' => $nit]);
  
                    $row = $stmt->fetchAll();
                    // SELECT COSTUMER
                    foreach ($row as $row) {
                        $orgDate = $row->created;
                        $newDate = date("F jS h:ia", strtotime($orgDate));
                        echo '
                        <tr>
                          <td scope="row">
                            <form class="form-ticket-submit"  action="ticket.php" method="post">
                              <input type="hidden" name="tid" value="'.$row->tid.'" id="tid" class="form-control">
                              <button class="btn" type="submit" name="submit-ticket" title="Ticket Number">
                                <svg class="svg-icon" viewBox="0 0 25 25" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M12.522,10.4l-3.559,3.562c-0.172,0.173-0.451,0.176-0.625,0c-0.173-0.173-0.173-0.451,0-0.624l3.248-3.25L8.161,6.662c-0.173-0.173-0.173-0.452,0-0.624c0.172-0.175,0.451-0.175,0.624,0l3.738,3.736C12.695,9.947,12.695,10.228,12.522,10.4 M18.406,10c0,4.644-3.764,8.406-8.406,8.406c-4.644,0-8.406-3.763-8.406-8.406S5.356,1.594,10,1.594C14.643,1.594,18.406,5.356,18.406,10M17.521,10c0-4.148-3.374-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.147,17.521,17.521,14.147,17.521,10"></path>
                                </svg>
                                <b>'.sprintf("%010s", $row->tid).'</b>
                              </button>
                            </form>
                          </td>
                          <td></td>
                          <td></td>
                          
                          <td>'.$row->msg.'</td>
                          <td>'.$newDate.'</td>

                          <td class="align-top">';
                        switch ($row->tstatus) {
                          case 0:
                              echo '<p style="color:#088da5" title="We’ve received your message and your ticket is waiting to be responded to by an agent."><b>open</b></p>';
                              break;
                          case 1:
                              echo '<p style="color:#b30000" title="Ticket has been closed."><b>closed</b></p>';
                              break;
                          case 2:
                              echo '<p style="color:#037d50" title="A determination has been made and your ticket has been closed."><b>resolved</b></p>';
                              break;
                            }
                        
                        echo '</td>
                        </tr>



                      ';
                    }
                     ?>

                  </tbody>
                </table>
                <div class="mb-5"></div> <!-- spacer -->

                

              </div> <!-- ./div table -->


























            </div>
          </div>


          <!-- CREATE CARD TAB -->
          <div class="tab-pane fade" id="v-pills-calendar" role="tabpanel" aria-labelledby="v-pills-calendar-tab">
          <div class="col-lg-12 col-md-8">
            <div class="mb-5"></div> <!-- spacer -->
            <h3>Calendar</h3>

            <!-- TICKET BUTTON -->
            <div class="mb-5"></div> <!-- spacer -->
            <div class="col-lg-12 col-md-6">
              <form class="form"  action="create_ticket.php" method="post">
                <div class="mb-4"></div>
                <button class="btn btn-outline-dark" type="submit" name="create-ticket-submit">Appointment</button>
              </form>
            </div>
            <div class="mb-5"></div> <!-- spacer -->
            <!-- END TICKET BUTTON -->

            <!-- CALENDAR BODY -->

            </div>

          </div>




        </div>
        <!--<canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="2330" height="983" style="display: block; height: 787px; width: 1864px;"></canvas>-->
        <?php require __DIR__."/footer.php"; ?>
      </main>
    </div>
  </div>
  
  <!-- GET PROGRAM STATUS FOR COSTUMER -->
  <?php
  // MAX VALUES TO REACH NEXT TIER
  $pqd_max = 50;
  $pqs_max = 50;
  ?>
  
  <script>
  Chart.defaults.global.legend.display = false;
  var ctxi = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctxi, {
    // The type of chart we want to create
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo $pqd; ?>, // current PQD
          <?php echo $pqd_max-$pqd; ?>, // to reach next tier PQD - 100000
        ],
        backgroundColor: [
          window.chartColors.blue,
          window.chartColors.gray,
        ],
        label: 'Dataset 1'
      }],
      labels: [
        '<?php echo ' current ' ?>',
        '<?php echo ' left ' ?>'
      ]
    },
    options: {
      responsive: true,
      legend: {
        position: 'left',
      },
      title: {
        display: false,
        text: 'Current Statement'
      },
      animation: {
        duration: 3000,
        animateScale: false,
        animateRotate: true
      }
    }
  });
  
  var ctxi = document.getElementById('myChart2').getContext('2d');
  var chart = new Chart(ctxi, {
    // The type of chart we want to create
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo $pqs; ?>, // current PQS
          <?php echo $pqs_max-$pqs; ?>, // to reach next tier PQS - 50
        ],
        backgroundColor: [
          window.chartColors.green,
          window.chartColors.gray,
        ],
        label: 'Dataset 1'
      }],
      labels: [
        '<?php echo ' current '?>',
        '<?php echo ' left ' ?>'
      ]
    },
    options: {
      responsive: true,
      legend: {
        position: 'left',
      },
      title: {
        display: false,
        text: 'Current Statement'
      },
      animation: {
        duration: 3000,
        animateScale: false,
        animateRotate: true
      }
    }
  });
  </script>