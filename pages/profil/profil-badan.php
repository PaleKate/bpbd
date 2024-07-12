<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('../includes/format_rupiah.php');
include('../includes/library.php');
?>	
<!doctype html>
<html lang="en">

<head>
<!-- ======= Head ======= -->
  <?php include('../includes/head.php');?>
<!-- End Head -->

<body>
<!-- ======= Header ======= -->
  <?php include('../includes/header.php');?>
<!-- End Header -->

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg align-items-center">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-6">
                    <div class="breadcrumb_tittle text-left">
                        <h2>Profil Badan</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="breadcrumb_content text-right">
                        <p>Home<span>/</span>Profil<span>/</span>Profil Badan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

   <!--================ Profil Badan Area =================-->
   <section class="blog_area single-post-area section_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 posts-list">
               <div class="single-post">
                  <div class="blog_details">
                     <h2>Profil BPBD Kota Tasikmalaya</h2>
					 <?php 
						$sql ="SELECT * FROM profil_bpbd WHERE id_bpbd='245ba5e67c9fb4fadc303427eef9fa785b3224a4'";
						$query = mysqli_query($koneksidb,$sql);
						$result = mysqli_fetch_array($query);
					 ?>
                     <div class="quote-wrapper">
                        <div class="quotes">
                        <?php echo $result['deskripsi'];?>
                        </div>
                     </div>
					 <h2>Dasar Pembentukan</h2>
						<?php echo $result['hukum'];?>
                  </div>
               </div>
         </div>
      </div>
   </section>
   <!--================Blog Area end =================-->

	<!-- footer part start-->
	<?php include('../includes/footer.php');?>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <?php include('../includes/js.php');?>
    <!-- footer part end-->
</body>

</html>