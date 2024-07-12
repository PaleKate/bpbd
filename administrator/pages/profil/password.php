<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('../includes/format_rupiah.php');
include('../includes/library.php');
if(strlen($_SESSION['alogin'])==0){	
header('location: ../../module=login');
} else{
?>	
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Database BPBD | Admin Dashboard</title>
    <?php include ('../includes/head.php'); ?>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <?php include ('../includes/header.php'); ?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <?php include ('../includes/sidebar.php'); ?>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Profil administrator BPBD Kota Tasikmalaya
                            </h2>
                        </div>
                        <div class="body">
							<form method="POST" enctype="multipart/form-data">
								<?php 
									$id = $_GET['id'];
									$sql ="SELECT * FROM administrator WHERE id_administrator='$id'";
									$query = mysqli_query($koneksidb,$sql);
									$result = mysqli_fetch_array($query);
								?>
								<div class="form-group row">
									<div class="col-sm-6 text-center mb-3 mb-sm-0">
									  <img src="../../images/pictures/<?php echo htmlentities($result['foto']);?>" 
											style="object-fit: cover; border:solid 3px #4154f1; 
											border-radius: 50%; height: 120px; width: 120px; margin-bottom:10px;">
										<div class="my-2"></div>
										<label class="control-label"><?php echo htmlentities($result['username']);?></label>
									</div>
								
									<div class="col-sm-6">
										<label class="form-control-label"><b>Password Sekarang</b></label>
										<div class="form-line">
											<input class="form-control" name="id" type="hidden" value="<?php echo $id;?>" required>
											<input class="form-control" name="passw" type="hidden" value="<?php echo htmlentities($result['password']);?>" required>
											<input type="password" name="pass" class="form-control" required>
										</div>
										<br>
										
										<label class="form-control-label"><b>Password Baru</b></label>
										<div class="form-line">
											<input type="password" class="form-control" name="newpass" required>
										</div>
										<br>
										
										<label class="form-control-label"><b>Password Baru</b></label>
										<div class="form-line">
											<input type="password" class="form-control" name="confirm" required>
										</div>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block waves-effect" name="submit">UPDATE</button>
								</div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</section>
	<?php include ('../includes/script.php'); ?>
<?php
if(isset($_POST['submit']))
{
$pass=$_POST['pass'];
$passw=$_POST['passw'];
$passcheck=password_verify($pass,$passw);
$newpass=$_POST['newpass'];
$confirm=$_POST['confirm'];
$id=$_POST['id'];
	
	$sql="SELECT * FROM administrator WHERE id_administrator='$id' AND password='$passcheck'";
	$query = mysqli_query($koneksidb,$sql);
	if(mysqli_num_rows($query)==0){
		if($newpass==$confirm){
			$newpass=password_hash($newpass, PASSWORD_DEFAULT);
			$sqlup="UPDATE administrator SET password='$newpass' WHERE id_administrator='$id'";
			$queryup= mysqli_query($koneksidb,$sqlup);
			if($queryup){
				echo 
				"<script type='text/javascript'>
					Swal.fire({
					  icon: 'success',
					  title: 'Done',
					  text: 'Password Berhasil Diupdate'
					  }).then(function() {
						window.location = 'profil.php?id=$id';
					});
				</script>";	
			}else{
				echo 
				"<script type='text/javascript'>
					Swal.fire({
					  icon: 'error',
					  title: 'Oops',
					  text: 'Gagal Update Password!'
					  }).then(function() {
						window.location = 'password.php?id=$id';
					});
				</script>";	
			}
		}else{
			echo 
				"<script type='text/javascript'>
					Swal.fire({
					  icon: 'warning',
					  title: 'Oops',
					  text: 'Password Baru Dan Konfirmasi Password Tidak Sama!'
					  }).then(function() {
						window.location = 'password.php?id=$id';
					});
				</script>";	
		}
	}else{
		
		echo 
				"<script type='text/javascript'>
					Swal.fire({
					  icon: 'warning',
					  title: 'Oops',
					  text: 'Password Salah Atau Password Baru Dan Konfirmasi Password Tidak Sama!!'
					  }).then(function() {
						window.location = 'password.php?id=$id';
					});
				</script>";	
	}
}	
?>
</body>
</html>
<?php }?>