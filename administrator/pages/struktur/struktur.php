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
<?php $page = "struktur-organisasi"; ?>
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
                                Edit Struktur Organisasi BPBD Kota Tasikmalaya
                            </h2>
							<ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="module=profil-pejabat">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
							<form method="post" class="form-horizontal" enctype="multipart/form-data">
								<div class="form-group">
								<label class="col-sm-4 control-label">Gambar Sekarang</label>
									<?php 
									$sql ="SELECT * FROM struktur WHERE id_struktur='bde24d4029a1a08bdda096170064ed3736a8de19'";
									$query	= mysqli_query($koneksidb, $sql);
									$result = mysqli_fetch_array($query);
									?>
									<div class="col-sm-8">
										<img src="../../images/struktur/<?php echo htmlentities($result['struktur']);?>" width="300" height="200" style="border:solid 1px #000">
									</div>
								</div>

								<div class="form-group">
								<input type="hidden" name="id" value="<?php echo htmlentities($result['id_struktur']);?>"required>
								<label class="col-sm-4 control-label">Upload Gambar Baru</label>
									<div class="col-sm-8">
										<input type="file" name="struktur" accept="image/*" required>
									</div>
								</div>
								<div class="hr-dashed"></div>
								
								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-4">
										<button class="btn btn-primary" name="update" type="submit">Update</button>
									</div>
								</div>

							</form>
						</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</section>
	<?php include ('../includes/script.php'); ?>
<?php 
if(isset($_POST['update'])){
	$struktur=$_FILES["struktur"]["name"];
	$id=$_POST['id'];
	move_uploaded_file($_FILES["struktur"]["tmp_name"],"../../images/struktur/".$_FILES["struktur"]["name"]);
	$sql="update struktur set struktur='$struktur' where id_struktur='$id'";
	$query	= mysqli_query($koneksidb, $sql);
	if($query){
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'success',
			  title: 'Done',
			  text: 'Berhasil Update Foto'
			}).then(function() {
				window.location = 'module=struktur-organisasi';
			});
		</script>";
}else {
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'warning',
			  title: 'Oops',
			  text: 'Terjadi Kesalahan Update Data!'
			}).then(function() {
				window.location = 'struktur.php;
			});
		</script>";
	}
}
?>
</body>
</html>
<?php }?>