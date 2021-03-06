<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['type'] != "0") {
header('location:../login.php');
}
require_once 'include/dataClass.php';
$dc = new Dataclass();
if (isset($_POST['btn-addb']))
{
$bname = $_POST['bname'];
$save = "insert into batch(bname) values('$bname')";
if ($dc->saveRecord($save))
{
$msg = "Batch Successfully Added";
}
else
{
$failmsg = "Error";
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>IANT Admin</title>
    <link rel="icon" href="../assets/img/icon.png">
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
  </head>
  <body class="fixed-nav sticky-footer bg-dark myfont" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top admin-cst-nav" id="mainNav">
      <a class="navbar-brand" href="index.php"><img src="../img/new.png" alt="" width="220px" height="60px"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="index.php">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Students">
            <a class="nav-link" href="tables.php">
              <i class="fa fa-users"></i>
              <span class="nav-link-text">Students</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Results">
            <a class="nav-link" href="result.php">
              <i class="fa fa-flag-checkered"></i>
              <span class="nav-link-text">Results</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Questions Bank">
            <a class="nav-link" href="question.php">
              <i class="fa fa-question-circle"></i>
              <span class="nav-link-text">Questions Bank</span>
            </a>
          </li>
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Courses">
            <a class="nav-link" href="course.php">
              <i class="fa fa-book"></i>
              <span class="nav-link-text">Courses</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Batch">
            <a class="nav-link" href="batch.php">
              <i class="fa fa-clock-o"></i>
              <span class="nav-link-text">Batch</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Question">
            <a class="nav-link" href="addq.php">
              <i class="fa fa-plus"></i>
              <span class="nav-link-text">Add Question</span>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user mr-2"></i><?php echo $_SESSION['urname']; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../logout.php"><i class="fa fa-sign-out mr-2" aria-hidden="true"></i> Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div class="content-wrapper mt-4">
      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Add Batch</li>
        </ol>
        <span>
          <?php if (isset($failmsg)) { ?>
          <div class="animated flash alert alert-danger">
            <span class="glyphicon glyphicon-info-sign"></span>
            <?php echo $failmsg; ?>
          </div>
          <?php } ?>
          <?php if (isset($msg)) { ?>
          <div class="animated flash alert alert-success">
            <span class="glyphicon glyphicon-info-sign"></span>
            <?php echo $msg; ?>
          </div>
          <?php } ?>
        </span>
        <form method="post" id="addq" action="" autocomplete="off">
          <div class="row">
            <div class="col-12">
              <h2 class="myfont">Add Batch</h2>
              <br>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                 <label for="bname" class="control-label">Enter Batch Name</label>
                <input type="text" name="bname" id="bname" class="form-control" autocomplete="off" placeholder="Enter Batch Name" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <input type="submit" name="btn-addb" value="Add Batch" class="btn btn-block btn-primary">
              </div>
            </div>
          </div>
        </form>
      </div>
      <footer class="sticky-footer">
        <div class="container">
          <div class="text-center">
            <small>Copyrights © XLOAD Inc. 2019</small>
          </div>
        </div>
      </footer>
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
      </a>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="../logout.php">Logout</a>
            </div>
          </div>
        </div>
      </div>
      <!--  <?php $getid = $dc->getRow("select dealerid from dealers") ?>
      <p style="display: none;" id="uidd"><?= $getid['dealerid'] ?></p> -->
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Page level plugin JavaScript-->
      <script src="vendor/chart.js/Chart.min.js"></script>
      <script src="vendor/datatables/jquery.dataTables.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
      <script src="js/sb-admin-charts.js"> </script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin.min.js"></script>
      <!-- Custom scripts for this page-->
      <script src="js/sb-admin-datatables.min.js"></script>
      <script>
        function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 65 || charCode > 90)) {
        return false;
        }
        return true;
        }
      </script>
      
    </div>
  </body>
</html>