<?php
include 'conn.php';
include 'auth.php';
$a=300;
$september = mysqli_query($con,"SELECT * FROM september ORDER BY id ASC"); 


error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php include"title.php"; ?>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">

<!-- summernote -->
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<!-- Navbar -->
<?php include"topbar.php"; ?>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<?php include"sidebar.php"; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Posting Details</h1>
</div>
<div class="col-sm-6" style="text-align:right;">
<!-- <a class="btn btn-primary" href="add-team.php">
<i class="fa fa-plus" aria-hidden="true"></i> Add New</a> -->
 
</div>
</div>
</div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-md-12">
<div class="card card-info">
<div class="card-header">
<h3 class="card-title">View</h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
<i class="fas fa-minus"></i></button>
</div>
</div>
<div class="card-body p-0">
<table class="table">
<div class="container pb-5">
<div class="row ">
<?php
while($row=mysqli_fetch_array($september)){
?>
<div class="col-md-4 zoom pb-5">
<div class="card-deck">
<div class="card">
<img class="card-img-top" style="height:270px;" src="images/services/september/<?php echo $row['img']; ?>" alt="Pending"> 
</div>
</div>
</div>
<div class="col-md-8 zoom pb-5">
<div class="card-deck">
<div class="card">
<div class="card-body">
 

<b><?php echo $row['date']; ?></a></b></h5>

<p class="card-text" style=""><b> Image - Remarks: &nbsp; <?php echo $row['imageremarks']; ?></b></p>
<p class="card-text" style=""><b> Text - Remarks: &nbsp; <?php echo $row['remarks']; ?></b></p>
</div><br>
<div class="card-footer">
<p align="justify"><?php echo $row['supporting_text']; ?></p>
</div>
</div>
</div>
</div>

<?php  } ?>
</div>
</div>
</table>
</div>

<!-- /.card-body -->
</div>
</div>
<!-- /.col-->
</div>
<!-- ./row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include"footer.php"; ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script>
$(function () {
// Summernote
$('.textarea').summernote()
})
</script>
<script>
function Export()
{
var conf = confirm("Export users to CSV?");
if(conf == true)
{
window.open("export.php", '_blank');
}
}
</script>
</body>
</html>
