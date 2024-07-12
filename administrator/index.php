<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
if(isset($_SESSION['alogin'])){
	header("location: module=dashboard");
	exit;
}
?>	
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Administrator BPBD | Kota Tasikmalaya</title>
    <?php include ('includes/head.php'); ?>
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Administrator <b>BPBD</b></a>
            <small>Badan Penanggulangan Bencana Daerah</small>
            <small style="margin-top:5px;">Kota Tasikmalaya</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Form Login Administrator</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" name="login">LOGIN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6 align-right">
                            <a href="pages/examples/forgot-password.php">Lupa Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>
	
	<!-- Sweetalert2 Plugin Js -->
	<script src="plugins/package/dist/sweetalert2.all.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>
</html>
<?php
if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$sql = "SELECT * FROM administrator WHERE username='$username'";
$query = mysqli_query($koneksidb,$sql);
if(mysqli_num_rows($query)>0){
	$row = mysqli_fetch_assoc($query);
	if(password_verify($password, $row['password'])){
		$_SESSION['alogin']=$row['id_administrator'];
		echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'success',
			  title: 'Done',
			  text: 'Login Berhasil'
			}).then(function() {
				window.location = 'module=dashboard';
			});
		</script>";	
	}else{
		"<script type='text/javascript'>
			Swal.fire({
			  icon: 'warning',
			  title: 'Oops',
			  text: 'Username atau Password Salah'
			  }).then(function() {
				window.location = 'module=login';
			});
		</script>";	
	}
}
}

?>