<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KoKeRu | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">

<?php
session_start(); //inisialisasi session
require_once('db_login.php');
if (isset($_SESSION['username'])){
  header('Location: cs_ruang.php');
}

//cek apakah user sudah submit form
if(isset($_POST["submit"])){
    $valid = TRUE; //flag validasi
    //cek validasi email
    $email = test_input($_POST['email']);
    if($email == ''){
        $error_email = "Email is required";
        $valid = FALSE;
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_email = "Invalid email format";
        $valid = FALSE;
    }
    //cek validasi password
    $password = test_input($_POST['password']);
    if($password == ''){
        $error_password = "Password is required";
        $valid = FALSE;
    }

    //cek validasi
    if($valid){
        //Assign a query
        $query =  "SELECT * FROM cs WHERE email = '".$email."' AND password='".md5($password)."' ";
        //Execute the query
        $result = $db->query($query);
        if(!$result){
            die ("Could not query the database: <br/>".$db->error);
        }else{
            if($result->num_rows > 0){
                $row = $result->fetch_object();
                $_SESSION['username'] = $email;
                echo("<script>location.href = 'cs_ruang.php?id=0';</script>");
                exit;
            }else{
                $error = "<b>Combination of username and password are not correct.</b>";
            }
        }
        //close db connection
        $db->close();
    }
}

?>





<div class="wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
            <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; width:50px; height:50px;">
            KoKeRu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Halaman Login Cleaning Service</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Horizontal Form -->
            <div class="card card-info shadow p-3 mb-5 bg-white rounded" style="width: 40%; margin: 20px auto; border-radius: 25px; box-sizing: border-box; padding: 15px 20px;">
              <div class="card-header">
                <h3 class="card-title">Form Login Cleaning Service</h3>
              </div>    
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="card-body">
                  <label for="inputEmail3" class="col-form-label">Email :</label>
                  <div>
                    <input type="email" class="form-control" id="email" name="email" size="30">
                  </div>
                    <label for="inputPassword3" class="col-form-label">Password :</label>
                    <div>
                     <input type="password" class="form-control" id="password" name="password" value="">
                  </div>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck2">
                      <label class="form-check-label" for="exampleCheck2">Remember me</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info" name="submit" value="submit">Sign in</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
			  
            </div>
			<div style="text-align:center; color:red;"><?php if(isset($error)) echo $error;?></div>
            <!-- /.card -->
</div>

<!-- ./wrapper -->
  <footer class="card-footer" style="position: fixed; left: 0; bottom: 0;  width: 100%;">
    <strong>Copyright &copy; 2020 <a href="https://adminlte.io">KoKeru</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0-rc
    </div>
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