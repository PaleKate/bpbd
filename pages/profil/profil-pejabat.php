<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('../includes/format_rupiah.php');
include('../includes/library.php');
?>	
<!doctype html>
<html lang="en">

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
                        <h2>Profil Pejabat</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="breadcrumb_content text-right">
                        <p>Home<span>/</span>Profil<span>/</span>Profil Pejabat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- Profil Pejabat start-->
    <section class="review_part section_padding margin_bottom">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-end">
                <div class="col-lg-5 col-xl-4">
                    <div class="tour_pack_text">
                        <h2>Profil Singkat Pejabat</h2>
                        <p>Badan Penanggulangan Bencana Daerah (BPBD) Kota Tasikmalaya</p>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="review_part_cotent owl-carousel">
						<?php 
							$sql ="SELECT pejabat.*, jabatan.* FROM pejabat, jabatan WHERE jabatan.id_jabatan=pejabat.id_jabatan ORDER BY jabatan.nomor ASC";
							$query = mysqli_query($koneksidb,$sql);
							while($result = mysqli_fetch_array($query)){
						?>
                        <div class="single_review_part">
                            <img src="../../administrator/images/profil/<?php echo $result['foto'];?>" alt="">
                            <div class="tour_pack_content">
                                <h4><?php echo $result['nama_pejabat'];?></h4>
                                <p><?php echo $result['jabatan'];?> </p><p>Badan Penanggulangan Bencana Daerah Kota Tasikmalaya</p>
                            </div>
                        </div>
						<?php }?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Profil Pejabat end-->
    
	<!--================ Struktur Area =================-->
	<section class="our_service section_padding single_page_services">
        <div class="container">
			<div class="row">
                <div class="col-sm-12 col-xl-12">
                    <div class="single_feature">
                        <div class="single_service">
							<div class="section_tittle">
								<h2>struktur organisasi</h2>
								<p>Badan Penanggulangan Bencana Daerah (BPBD) Kota Tasikmalaya</p>
							</div>
							<?php 
							$sql2 ="SELECT * FROM struktur WHERE id_struktur='bde24d4029a1a08bdda096170064ed3736a8de19'";
							$query2 = mysqli_query($koneksidb,$sql2);
							$result2 = mysqli_fetch_array($query2);
						?>
								<img class="img-fluid" src="../../administrator/images/struktur/<?php echo $result2['struktur'];?>" alt="blog" style="background-position: center;background-repeat: no-repeat;background-size: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</section>

    <!-- footer part start-->
	<?php include('../includes/footer.php');?>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <?php include('../includes/js.php');?>
    <!-- footer part end-->
</body>

</html>