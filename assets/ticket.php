<!-- relative root -->
<?php
session_start();
$path = '';
include $path.'../includes/dbh.inc.php';
include $path.'../includes/bypass_security.php';
include $path.'header.php';

if (isset($_POST['form-ticket-submit'])) {
  // code...
}

$tid = $_POST['tid'];
$ucid = 0;
if ($_SESSION['cadmin']) {
  # code...
  $ucid = 1;
}

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

            <a class="nav-link active" href="<?php print ($_SESSION['cadmin'] == 1) ? "cpanel.php" : "dashboard.php"; ?>" role="tab" aria-controls="v-pills-home" aria-selected="true">
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
        <!-- <ul class="nav flex-column mb-2">
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
        </ul> -->
      </div>
    </nav>





    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <!-- TICKET OBJECT FETCH -->
      <?php
        $sql = 'SELECT * FROM ticket WHERE tid = :tid';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['tid' => $tid]);
        $result = $stmt->fetchObject();

        
      ?>


      <div class="d-flex justify-content-between dash-chart-main flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h6">Ticket <b><?php echo sprintf("%010s", $result->tid); ?></b></h1>



        <div class="btn-toolbar mb-2 mb-md-0">
          Status 
          <div class="mx-2 mr-4">
            <?php switch ($result->tstatus) {
              case 0:
                echo '<p style="color:#088da5" title="We’ve received your message and your ticket is waiting to be responded to by an agent."><b> open</b></p>';
                break;
              case 1:
                echo '<p style="color:#b30000" title="Ticket has been closed."><b> closed</b></p>';
                break;
              case 2:
                echo '<p style="color:#037d50" title="A determination has been made and your ticket has been closed."><b> resolved</b></p>';
                break;
              } ?></div>
          <!-- <div class="btn-group mr-2">
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
          </button> -->
        </div>

      </div>

      <!-- FUNCTIONALITY -->



        <div class="tab-content" id="v-pills-tabContent">



          <!-- HOME TAB -->
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">


            <div class="container">



              <div class="mb-5"></div> <!-- spacer -->
              <h4>Title</h4>
              <h3><strong><?php echo $result->msg; ?> </strong></h3>
              <div class="mb-4"></div> <!-- spacer -->


              <div class="mb-5"></div> <!-- spacer -->


              <div class="table-responsive">
                <table class="table table-striped">

                  <tbody>

                    <?php
                    $sql = 'SELECT * FROM ticket_comment WHERE tid = :tid ORDER BY created ASC';
                    $stmt = $conn->prepare($sql);
                    $stmt->execute(['tid' => $tid]);
                    $row = $stmt->fetchAll();

                    foreach ($row as $row) {
                      $orgDate = $row->created;
                      $newDate = date("F jS h:ia", strtotime($orgDate));

                      if ($row->ucid == 0) {
                        echo '
                        <tr>
                          <td style="font-weight:bold; font-size: 0.9em; width: 40%;">
                            '.$newDate.'
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div style="max-width:50%; word-wrap:break-word;">
                              <h5 class="h6">'.$row->msg.'</h5>
                            </div>
                          </td>
                        </tr>
                        ';
                      } else {
                        echo '
                        <trstyle="width:30%">
                          <td style="font-weight:bold; font-size: 0.9em;" align= "right">
                            '.$newDate.'
                            <img class="mx-2" src="media/logo.svg" width="25" height="25" class="d-inline-block align-top" alt="" loading="lazy">
                          </td>
                        </tr>
                        <tr align= "right">
                          <td>
                            <div style="max-width:50%; word-wrap:break-word;">
                              <h5 class="h6">'.$row->msg.'</h5>
                            </div>
                          </td>
                        </tr>
                        ';
                      }
                    }
                     ?>

                  </tbody>
                </table>
              </div>
              <!-- Chat Box -->
              <hr>
            
                <?php 
                
                if ($result->tstatus == 0) {
                  echo '
                  <div class="col-lg-12 col-md-8">
                  <form class="form"  action="'.$path.'includes/comment.inc.php" method="post">
                    <div class="mb-5"></div>
                    <!-- ticket id -->
                    <input type="hidden" name="tid" value="'.$tid.'" id="tid" class="form-control">
                    <input type="hidden" name="ucid" value="'.$ucid.'" id="ucid" class="form-control">
                    <!-- text area -->
                    <div class="form-label-group mb-3">
                      <textarea class="form-control" name="comment" rows="4" required></textarea>
                    </div>
                    <div class="mb-5"></div>
                    <button class="btn btn-lg btn-outline-dark" type="submit" name="add-comment-submit">Add Comment</button>
                  </form>
                </div>
                  ';
                } else {
                  echo '
                    Ticket closed by agent.
                  ';
                }

                if ($_SESSION['cadmin']) {
                  # code...
                  echo '
                  <div class="mb-5"></div>
                  <div class="col-lg-12 col-md-8">
                  <form class="form-signin"  action="'.$path.'includes/close_ticket.inc.php" method="post">
                    <div class="text-center mb-4">
                      <h6>set ticket <b>status</b>.</h6>
                    </div>
                  
                    <div class="mb-5"></div>
                    <input type="hidden" name="tid" value="'.$tid.'" id="tid" class="form-control">
                    <div class="form-label-group mb-3">
                      <select id="tstatus" name="tstatus" class="form-control selectpicker" title="" required>
                        <option value="0">open</option>
                        <option value="1">closed</option>
                        <option value="2">resolved</option>
                      </select>
                    </div>
                    <button class="btn btn-md btn-outline-dark" type="submit" name="close-ticket-submit">submit</button>
                  </form>
                </div>
                  ';
                }
                ?>
            
            </div>

          </div>

        </div>
        <!-- footer -->
        <?php require __DIR__."/footer.php"; ?>
      </main>
    </div>
  </div>
