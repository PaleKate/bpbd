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
							<form method="POST">
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
										  <a class="btn btn-primary" href="changeimgadmin.php?imgid=<?php echo htmlentities($result['id_administrator'])?>">
											Change Profil</a>
									</div>
								
									<div class="col-sm-6">
										<label class="form-control-label"><b>Username</b></label>
										<div class="form-line">
											<input type="hidden" name="id" value="<?php echo $result['id_administrator'];?>" required>
											<input type="text" name="username" class="form-control" value="<?php echo $result['username'];?>" required>
										</div>
										<br>
										<label class="form-control-label"><b>Status</b></label>
										<div class="form-line">
											<input type="text" class="form-control" name="status" value="Aktif" readonly>
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
$username=$_POST['username'];
$id=$_POST['id'];
$sql1="UPDATE administrator SET username='$username' WHERE id_administrator='$id'";
$lastInsertId = mysqli_query($koneksidb, $sql1);
	if($lastInsertId){
		echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'success',
			  title: 'Done',
			  text: 'Update Profil Berhasil'
			  }).then(function() {
				window.location = 'profil.php?id=$id';
			});
		</script>";	
	}else {
		echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'warning',
			  title: 'Oops',
			  text: 'Terjadi Kesalahan Update Profil!!',
			  });.then(function() {
				window.location = 'profil.php';
			});
		</script>";	
	}
}	
?>
</body>
</html>
<?php }?>