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
<?php $page = "visi-misi"; ?>
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
                                Data Visi & Misi BPBD Kota Tasikmalaya
                            </h2>
                        </div>
                        <div class="body">
							<form method="POST" action="module=visi-misi-edit">
								<?php 
									$sql ="SELECT * FROM visi_misi WHERE id_visi_misi='q5dc32b75oa59abcq321vafel9j1e68f3dbc0x2p'";
									$query = mysqli_query($koneksidb,$sql);
									$result = mysqli_fetch_array($query);
								?>
								<div class="form-group">
									<label class="form-control-label"><b>Visi</b><span style="color:red">*</span></label>
									<div class="form-line">
										<input type="hidden" name="id" value="<?php echo htmlentities($result['id_visi_misi']);?>">
										<textarea type="text" class="form-control" name="visi" required><?php echo htmlentities($result['visi']);?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="form-control-label"><b>Misi</b><span style="color:red">*</span></label>
									<div class="form-line">
										<textarea type="text" class="form-control" name="misi" required><?php echo htmlentities($result['misi']);?></textarea>
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
		CKEDITOR.replace('visi');
		CKEDITOR.replace('misi');
	</script>
</body>
</html>
<?php }?>