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
                        <h2>berita bencana</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="breadcrumb_content text-right">
                        <p>Home<span>/</span>Berita<span>/</span>Berita Bencana</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->


    <!--================Blog Area =================-->
    <section class="blog_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <?php 
							$jmldataperhal = 5;
							$total = mysqli_query($koneksidb,"SELECT * FROM berita");
							$jmldata = mysqli_num_rows($total);
							
							$jmlhal = ceil($jmldata / $jmldataperhal);
							$halaktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
							$awaldata = ($halaktif * $jmldataperhal) - $jmldataperhal;
							
							$sqlkat = "SELECT * FROM berita ORDER BY tgl DESC LIMIT $awaldata,$jmldataperhal";
							$querykat = mysqli_query($koneksidb,$sqlkat);
							while ($result = mysqli_fetch_array($querykat)){
								$date = new DateTime($result["tgl"]);
								$tgl = $date->format('d');
								$deskripsi = substr($result["deskripsi"], 0, 170);
						?>
						<article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="../../administrator/images/berita/<?php echo htmlentities($result['gambar']);?>" alt="">
                                <a href="../../pages/berita/berita-details?id=<?php echo htmlentities($result['id_berita']);?>" class="blog_item_date">
                                    <h3><?php echo $tgl; ?></h3>
                                    <p><?php echo Indonesia3Tgl($result['tgl']); ?></p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="../../pages/berita/berita-details?id=<?php echo htmlentities($result['id_berita']);?>">
                                    <h2><?php echo htmlentities($result['judul']);?></h2>
                                </a>
                                <p><?php echo $deskripsi; ?>...</p>
                                <ul class="blog-info-link">
                                    <li><a href="../../pages/berita/berita-details?id=<?php echo htmlentities($result['id_berita']);?>"><i class="far fa-user"></i> Read More</a></li>
                                </ul>
                            </div>
                        </article>
						<?php }?>
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="berita.php?halaman=<?php echo $halaktif - 1;?>" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
								<?php for($i= 1; $i <=$jmlhal; $i++){ ?>
								<?php if($i == $halaktif){ ?>
                                <li class="page-item active">
                                    <a href="berita.php?halaman=<?php echo $i;?>" class="page-link" style="font-weight:bold;"><?php echo $i;?></a>
                                </li>
								<?php }else{ ?>
								<li class="page-item">
                                    <a href="berita.php?halaman=<?php echo $i;?>" class="page-link"><?php echo $i;?></a>
                                </li>
								<?php }}?>
                                <li class="page-item">
                                    <a href="berita.php?halaman=<?php echo $halaktif + 1;?>" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                               <div class="form-group">
                                  <div class="input-group mb-3">
                                     <input type="text" class="form-control" placeholder='Search Keyword'
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                     <div class="input-group-append">
                                        <button class="btn" type="button"><i class="ti-search"></i></button>
                                     </div>
                                  </div>
                               </div>
                               <button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">Search</button>
                            </form>
                         </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Kategori</h4>
                            <ul class="list cat-list">
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Banjir</p>
                                        <p>(37)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Longsor</p>
                                        <p>(10)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Gempa</p>
                                        <p>(03)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Kebakaran</p>
                                        <p>(11)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Kekeringan</p>
                                        <p>21</p>
                                    </a>
                                </li>
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Terkini</h3>
							<?php 
								$sqlkat = "SELECT * FROM berita ORDER BY tgl DESC LIMIT 4";
								$querykat = mysqli_query($koneksidb,$sqlkat);
								while ($result = mysqli_fetch_array($querykat)){
									$judul = substr($result["judul"], 0, 30);
							?>
                            <div class="media post_item">
                                <img src="../../administrator/images/berita/<?php echo $result['gambar'];?>" alt="post" width="100" height="80">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3><?php echo $judul;?>...</h3>
                                    </a>
                                    <p><?php echo Indonesia2Tgl($result['tgl']);?></p>
                                </div>
                            </div>
								<?php }?>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <!-- footer part start-->
	<?php include('../includes/footer.php');?>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <?php include('../includes/js.php');?>
    <!-- footer part end-->
</body>

</html>