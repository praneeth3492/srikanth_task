<?php
include 'conn.php';
include 'auth.php';
$a=203;
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="format-detection" content="telephone=no">
<!-- Primary Meta Tags -->
<title> DrSm@rt Posting </title>

<!-- Stylesheets --> 
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

<?php
date_default_timezone_set('Asia/Kolkata');
$today = date("D d M Y");
$edit = $_GET['edit'];
$resultt = mysqli_query($con,"SELECT * FROM august where id='$edit'");
$roww = mysqli_fetch_array($resultt);
if(isset($_POST['publise'])){

$date1 = $_POST['date'];
$date= str_replace("'","\'", $date1);

$imageremarks1 = $_POST['imageremarks'];
$imageremarks = str_replace("'","\'", $imageremarks1);

$supporting_text1 = $_POST['supporting_text'];
$supporting_text = str_replace("'","\'", $supporting_text1);

$remarks1 = $_POST['remarks'];
$remarks = str_replace("'","\'", $remarks1);

$url = $_POST['url'];



if($_FILES['lis_img']['name']!=''){
$lis_img = time().$_FILES['lis_img']['name'];
}
else{
$lis_img = $roww["img"];
}

$tempname = $_FILES['lis_img']['tmp_name'];

$folder = "images/services/august/".$lis_img;
if($edit==''){

move_uploaded_file($tempname, $folder);

$insertdata = mysqli_query($con,"INSERT INTO august(date,imageremarks,supporting_text,remarks,img)VALUES('$date','$imageremarks','$supporting_text','remarks','$lis_img')");
echo "<script>alert('Posted Successfully');</script>
<script>window.location.href = 'august_add.php'</script>";
}
else{
move_uploaded_file($tempname, $folder);

$insertdata = mysqli_query($con,"UPDATE august SET date='$date',supporting_text='$supporting_text',imageremarks='$imageremarks',remarks='$remarks',img='$lis_img' where id=".$edit."");

echo "<script>alert('Updated Successfully');</script>

<script>window.location.href = 'august.php'</script>";
}
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb
2">

<div class="col-sm-6">
<h1>Posting Page</h1>
</div>
</div>
</div><!-- /.container-fluid -->
</section>
<section class="content">
<div class="row">
<!-- Main content -->
<div class="table-responsive bs-example widget-shadow">
<form action="" method="post" enctype="multipart/form-data">
<table class="table table-bordered"> 
    

<thead> <tr>   
    <th> Date</th> <th>Image</th><th>Image_Remarks</th> 
     <th>Support_text</th> <th>Text_remarks</th><th>Action</th> </tr> </thead> <tbody>
<tr>  
<td><input name="date" value="<?php echo $roww["date"]; ?>" type="date" class="form-control" placeholder="Name ..."></td>


<td><input name="lis_img" type="file" style="width: 100%;" >
<?php echo $roww["img"]; ?></td> 


<td><textarea name="imageremarks" placeholder="message" style="width: 100%;" class="textarea"><?php echo $roww["imageremarks"]; ?></textarea></td>


<td><textarea name="supporting_text" placeholder="message" style="width: 100%;" class="textarea"><?php echo $roww["supporting_text"]; ?></textarea></td>

<td><textarea name="remarks" placeholder="text" style="width: 100%;" class="textarea"><?php echo $roww["remarks"]; ?></textarea></td>

<td><button type="submit" name="publise" class="btn btn-block btn-warning btn-lg">Post</button></td> </tr>   <?php 
?></tbody> </table>

<!-- /.content -->
</div>
</form>
<!-- ./row -->
</section>
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

</body>
</html>