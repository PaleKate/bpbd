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
                        <h2>Visi & Misi</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="breadcrumb_content text-right">
                        <p>Home<span>/</span>Profil<span>/</span>Visi & Misi</p>
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
					<?php 
						$sql ="SELECT * FROM visi_misi WHERE id_visi_misi='q5dc32b75oa59abcq321vafel9j1e68f3dbc0x2p'";
						$query = mysqli_query($koneksidb,$sql);
						$result = mysqli_fetch_array($query);
					?>
                     <h2>Visi</h2>
                     <div class="quote-wrapper">
                        <div class="quotes">
                        <?php echo $result['visi'];?>
                        </div>
                     </div>
					 <h2>Misi</h2>
                     <div class="quote-wrapper">
						<div class="quotes">
						 <?php echo $result['misi'];?>
						</div>
					 </div>
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