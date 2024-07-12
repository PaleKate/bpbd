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
                        <h2>Berita Details</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="breadcrumb_content text-right">
                        <p>Home<span>/</span>Berita<span>/</span>Berita Details</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section_padding">
      <div class="container">
         <div class="row">
			<?php 
				$id=$_GET['id'];
				$sql ="SELECT * FROM berita WHERE id_berita='$id'";
				$query	= mysqli_query($koneksidb, $sql);
				$result = mysqli_fetch_array($query);
			?>
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="card-img rounded-0" src="../../administrator/images/berita/<?php echo $result['gambar'];?>" alt="">
                  </div>
                  <div class="blog_details">
                     <h2><?php echo htmlentities($result['judul']);?></h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="far fa-user"></i> <?php echo Indonesia2Tgl($result['tgl']);?></a></li>
                     </ul>
                     <p class="excert">
                        <?php echo $result['deskripsi'];?>
                     </p>
                  </div>
               </div>
               <div class="comment-form">
                  <h4>Leave a Reply</h4>
                  <form class="form-contact comment_form" action="#" id="commentForm">
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                 placeholder="Write Comment"></textarea>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="button btn_1 button-contactForm">Send Message</button>
                     </div>
                  </form>
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
   <!--================Blog Area end =================-->

   <!-- footer part start-->
	<?php include('../includes/footer.php');?>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <?php include('../includes/js.php');?>
    <!-- footer part end-->
</body>

</html>