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
<?php $page = "kontak"; ?>
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
                                Data Kontak BPBD Kota Tasikmalaya
                            </h2>
                        </div>
                        <div class="body">
							<form method="POST" action="module=kontak-kami-edit">
								<?php 
									$sql ="SELECT * FROM kontak WHERE id_kontak='15fx38o70ol54af2q3g1v4pel9j1l37h3cqc0z0h'";
									$query = mysqli_query($koneksidb,$sql);
									$result = mysqli_fetch_array($query);
								?>
								<div class="row clearfix">
								  <div class="col-sm-6">
									<div class="form-group">
										<label class="form-control-label"><b>Email</b><span style="color:red">*</span></label>
										<div class="form-line">
											<input type="email" class="form-control" name="email" value="<?php echo htmlentities($result['email']);?>" required>
										</div>
									</div>
								  </div>
								  <div class="col-sm-6">
									<div class="form-group">
										<label class="form-control-label"><b>Nomor Whatsapp</b><span style="color:red">*</span></label>
										<div class="form-line">
											<input type="number" class="form-control" name="nomor" min=0 value="<?php echo htmlentities($result['nomor']);?>"required>
										</div>
									</div>
								  </div>
								</div>
								<div class="form-group">
									<label class="form-control-label"><b>Link Lokasi</b><span style="color:red">*</span></label>
									<div class="form-line">
										<input type="text" class="form-control" name="lokasi" value="<?php echo htmlentities($result['lokasi']);?>" required>
									</div>
								</div>
								<div class="form-group">
									<label class="form-control-label"><b>Alamat Lengkap</b><span style="color:red">*</span></label>
									<div class="form-line">
										<input type="hidden" name="id" value="<?php echo htmlentities($result['id_kontak']);?>">
										<textarea type="text" class="form-control" name="alamat" required><?php echo htmlentities($result['alamat']);?></textarea>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary waves-effect" name="submit">UPDATE</button>
								</div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</section>
	<?php include ('../includes/script.php'); ?>
	<script>
		CKEDITOR.replace('alamat');
	</script>
</body>
</html>
<?php }?>