<?php
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
                        <h2>edukasi bencana</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="breadcrumb_content text-right">
                        <p>Home<span>/</span>Edukasi<span>/</span>Edukasi Bencana</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- Edukasi Bencana part start-->
    <section class="our_project section_padding" id="portfolio">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12">
                    <div class="section_tittle">
                        <h2>konten edukasi bencana</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="filters portfolio-filter project_menu_item">
                        <ul class="list">
                            <li class="active" data-filter="*" ><button class="genric-btn primary-border circle arrow">All</button></li>
							<?php
								$sql2 = "SELECT * FROM kategori ORDER BY kategori ASC";
								$query2 = mysqli_query($koneksidb,$sql2);
									while($result = mysqli_fetch_array($query2)){
							?>
							<li data-filter=".<?php echo $result['id_kategori'];?>"><button class="genric-btn primary-border circle arrow"><?php echo $result['kategori'];?></button></li>
							<?php }?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="filters-content">
                <div class="row justify-content-between portfolio-grid">
                    <?php
						$sql2 = "SELECT konten.*, kategori FROM konten, kategori WHERE
								 konten.id_kategori=kategori.id_kategori ORDER BY judul ASC";
						$query2 = mysqli_query($koneksidb,$sql2);
							while($result = mysqli_fetch_array($query2)){ 
							$judul = substr($result["judul"], 0, 30);
					?>
					<a href="../../pages/edukasi/edukasi-bencana-detail?id=<?php echo htmlentities($result['id_konten']);?>">
					<div class="col-lg-4 col-sm-6 all <?php echo $result['id_kategori'];?>">
                        <div class="single_our_project">
                            <div class="single_offer">
                                <img src="../../administrator/images/thumbnail/<?php echo htmlentities($result['thumbnail']);?>" alt="offer_img_1">
                                <div class="hover_text">
										<h2><?php echo $judul;?>...</h2>
										<p><?php echo htmlentities($result['kategori']);?></p>
                                </div>
                            </div>
                        </div>
                    </div>
					</a>
							<?php }?>
                </div>
            </div>
        </div>
    </section>
    <!-- edukasi bencana part end-->
    

    <!-- footer part start-->
	<?php include('../includes/footer.php');?>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <?php include('../includes/js.php');?>
    <!-- footer part end-->
</body>

</html>