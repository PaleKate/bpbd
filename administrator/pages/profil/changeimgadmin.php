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
                                Edit Foto Profil Administrator BPBD Kota Tasikmalaya
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
								<label class="col-sm-4 control-label">Foto Sekarang</label>
									<?php 
									$id=$_GET['imgid'];
									$sql ="SELECT * FROM administrator WHERE id_administrator='$id'";
									$query	= mysqli_query($koneksidb, $sql);
									$cnt=1;
									while ($result = mysqli_fetch_array($query)){
									?>
									<div class="col-sm-8">
										<img src="../../images/pictures/<?php echo htmlentities($result['foto']);?>" width="300" height="200" style="border:solid 1px #000">
									</div>
								<?php }?>
								</div>

								<div class="form-group">
								<input type="hidden" name="id" value="<?php echo $id; ?>"required>
								<label class="col-sm-4 control-label">Upload Foto Baru</label>
									<div class="col-sm-8">
										<input type="file" name="foto" accept="image/*" required>
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
	$foto=$_FILES["foto"]["name"];
	$id=$_POST['id'];
	move_uploaded_file($_FILES["foto"]["tmp_name"],"../../images/pictures/".$_FILES["foto"]["name"]);
	$sql="update administrator set foto='$foto' where id_administrator='$id'";
	$query	= mysqli_query($koneksidb, $sql);
	if($query){
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'success',
			  title: 'Done',
			  text: 'Berhasil Update Foto'
			}).then(function() {
				window.location = 'profil.php?id=$id';
			});
		</script>";
}else {
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'warning',
			  title: 'Oops',
			  text: 'Terjadi Kesalahan Update Data!'
			}).then(function() {
				window.location = 'changeimage1.php?imgid=$id';
			});
		</script>";
	}
}
?>
</body>
</html>
<?php }?>