<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KoKeRu | Update Ruang Pembersihan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <style>
	  /* The switch - the box around the slider */
		.switch {
		  position: relative;
		  display: inline-block;
		  width: 60px;
		  height: 34px;
		}

		/* Hide default HTML checkbox */
		.switch input {
		  opacity: 0;
		  width: 0;
		  height: 0;
		}

		/* The slider */
		.slider {
		  position: absolute;
		  cursor: pointer;
		  top: 0;
		  left: 0;
		  right: 0;
		  bottom: 0;
		  background-color: #ccc;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		.slider:before {
		  position: absolute;
		  content: "";
		  height: 26px;
		  width: 26px;
		  left: 4px;
		  bottom: 4px;
		  background-color: white;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		input:checked + .slider {
		  background-color: #2196F3;
		}

		input:focus + .slider {
		  box-shadow: 0 0 1px #2196F3;
		}

		input:checked + .slider:before {
		  -webkit-transform: translateX(26px);
		  -ms-transform: translateX(26px);
		  transform: translateX(26px);
		}

		/* Rounded sliders */
		.slider.round {
		  border-radius: 34px;
		}

		.slider.round:before {
		  border-radius: 50%;
		}
	</style>
</head>
<body class="hold-transition sidebar-mini">

<?php
	session_start();
	require_once('db_login.php');
	$id = NULL;
	if($_GET['id'] != NULL)
{
	$id= $_GET['id'];
}
else
{
	$id = NULL;
}
  if (!isset($_SESSION['username'])){
                header('Location: awal.php');
            }
	if($id!=NULL)
{	

	 $_SESSION['ruang'] = $id;
}
?>
<script>
function readURL(input,n) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
				if(n == 1)
				{
					reader.onload = function (e) {
                    $('#pic1')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
					};
				}
				else if(n == 2)
				{
					reader.onload = function (e) {
                    $('#pic2')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
					};
				}
				else if(n == 3)
				{
					reader.onload = function (e) {
                    $('#pic3')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
					};
				}
				else if(n == 4)
				{
					reader.onload = function (e) {
                    $('#pic4')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
					};
				}
				else if(n == 5)
				{
					reader.onload = function (e) {
                    $('#pic5')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
					};
				}
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="cs_ruang.php?id=0" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

   <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="cs_ruang.php?id=0" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">KoKeRu</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <?php
		$query = "SELECT nama_cs FROM cs WHERE email = '".$_SESSION['username']."'";
		$result = $db->query($query);
		if (!$result){
			 die ("Could not query the database: <br />". $db->error ."<br>Query: ".$query);
		}
		$row = $result->fetch_object();
		echo "<a href='#' class='d-block'>".$row->nama_cs."</a>";
		if(isset($_POST['submit'])){
				$count = 0;
				$valid = TRUE; //flag validasi
				if ($_FILES['file1']['size'] != 0)
				{
					$count = $count + 1;
				}
				if ($_FILES['file2']['size'] != 0)
				{
					$count = $count + 1;
				}
				if ($_FILES['file3']['size'] != 0)
				{
					$count = $count + 1;
				}
				if ($_FILES['file4']['size'] != 0)
				{
					$count = $count + 1;
				}
				if ($_FILES['file5']['size'] != 0)
				{
					$count = $count + 1;
				}
				if ($count < 2)
				{
					$valid = FALSE;
					echo '<script>alert("Bukti yang dilampirkan minimal 2 file!");</script>';
				}
				if(!isset($_POST['check']))
				{
                   	$valid = FALSE;
					echo '<script>alert("Tolong check jika ruangan sudah bersih!");</script>';
				}
				else
				{
					$check = $_POST['check'];
				}
				
					
				if($valid){
				$target1 = "../../images/".basename($_FILES['file1']['name']);
				$target2 = "../../images/".basename($_FILES['file2']['name']);
				$target3 = "../../images/".basename($_FILES['file3']['name']);
				$target4 = "../../images/".basename($_FILES['file4']['name']);
				$target5 = "../../images/".basename($_FILES['file5']['name']);
				$file1 = $_FILES['file1']['name'];
				$file2 = $_FILES['file2']['name'];
				$file3 = $_FILES['file3']['name'];
				$file4 = $_FILES['file4']['name'];
				$file5 = $_FILES['file5']['name'];
				$query = "UPDATE trx_cs_ruang SET status='Sudah Dibersihkan', bukti1 ='".$file1."', bukti2 ='".$file2."', bukti3 ='".$file3."', bukti4 ='".$file4."', bukti5 ='".$file5."' WHERE id_ruang = ".$_SESSION['ruang'];
				$result = $db->query($query);
				if(!$result){
					die("Could not query the database: <br/>". $db->error);
				}else{
				move_uploaded_file($_FILES['file1']['tmp_name'], $target1);
				move_uploaded_file($_FILES['file2']['tmp_name'], $target2);
				move_uploaded_file($_FILES['file3']['tmp_name'], $target3);
				move_uploaded_file($_FILES['file4']['tmp_name'], $target4);
				move_uploaded_file($_FILES['file5']['tmp_name'], $target5);
				$db->close();
				echo("<script>location.href = 'cs_ruang.php?id=0';</script>");
				}
				}
				
				}
          ?>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="cs_ruang.php?id=0" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
         <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Sign Out
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Ruang Jadwal Pembersihan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Ruang</li>
            </ol>
          </div>
        </div>
		<?php
            $query = "SELECT * FROM cs_ruang JOIN cs ON cs_ruang.id_cs = cs.id_cs WHERE cs.email = '".$_SESSION['username']."' AND cs_ruang.id_ruang = ".$id;
            $result = $db->query($query);
            if (!$result){
                 die ("Could not query the database: <br />". $db->error ."<br>Query: ".$query);
            }
            $row = $result->fetch_object();
            echo "<p href='#' class='d-block'>Ruang : ".$row->nama_ruang." - ".$row->nama_cs."</p>";
          ?>
      </div><!-- /.container-fluid -->
	<form id="form" method="post" enctype="multipart/form-data" action="cs_update.php?id=<?php echo ($id);?>">
	  <div class="card">
		<br>
		<h3 style="text-align:center;">Bukti Foto/Video</h3>
		<br>
		  <div class="d-flex justify-content-between">
			<p> </p>
			<img id="pic1" src="https://placehold.it/150x150" alt="...">
			<img id="pic2" src="https://placehold.it/150x150" alt="...">
			<img id="pic3" src="https://placehold.it/150x150" alt="...">
			<img id="pic4" src="https://placehold.it/150x150" alt="...">
			<img id="pic5" src="https://placehold.it/150x150" alt="...">
			<p> </p>
		   </div>
		   <div class="d-flex justify-content-between">
		   <p> </p>
			<input type='file' onchange="readURL(this,1);" name="file1" style="width:150px;" <?php if(isset($file1)) {echo "value='".$file1."'";} ?>/>
			<input type='file' onchange="readURL(this,2);" name="file2" style="width:150px;" <?php if(isset($file2)) {echo "value='".$file2."'";} ?>/>
			<input type='file' onchange="readURL(this,3);" name="file3" style="width:150px;" <?php if(isset($file3)) {echo "value='".$file3."'";} ?>/>
			<input type='file' onchange="readURL(this,4);" name="file4" style="width:150px;" <?php if(isset($file4)) {echo "value='".$file4."'";} ?>/>
			<input type='file' onchange="readURL(this,5);" name="file5" style="width:150px;" <?php if(isset($file5)) {echo "value='".$file5."'";} ?>/>
			<p> </p>
		   </div>
		   <br>
		   <div class="col-sm-2">
		<input type="hidden" id="custId" name="custId">
    </div>
	<br>
	<h3 style="text-align:center;">Kondisi dibersihkan</h3>
	<!-- Rounded switch -->
	<div class="d-flex justify-content-center">
		<p>Belum  </p>
		<label class="switch">
		  <input type="checkbox" name="check" value="Yes" <?php if(isset($check)) {echo "checked";} ?>/>>
		  <span class="slider round"></span>
		</label>
		<p>  Sudah</p>
	</div>
	<br>
	<div class="d-flex justify-content-center">
		<button type="submit" name="submit" class="btn btn-success btn-flat" style="width:200px;">Update</button>
	</div>
	</br>
  </div>
		</div>
	</form>
    </section>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
  <footer class="main-footer">
	<a href="javascirpt:void(0)" rel='.$row["id"].' class="showpopup">
<script>
$(".showpopup").click(function(ev)
{   
      var getid = $(this).attr('rel'); // get id value
      alert(getid); // check to see if you are getting the value.
      ev.preventDefault();
}
</script>
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2020 <a href="https://adminlte.io">KoKeRu</a>.</strong> All rights reserved.

  </footer>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
