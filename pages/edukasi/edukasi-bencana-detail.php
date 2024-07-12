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
                        <h2>edukasi bencana details</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="breadcrumb_content text-right">
                        <p>Home<span>/</span>Edukasi<span>/</span>Edukasi Bencana Details</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- project_details part start -->
    <section class="project_details section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
				<?php
					$id=$_GET['id'];
					$sql ="SELECT * FROM konten WHERE id_konten='$id'";
					$query	= mysqli_query($koneksidb, $sql);
					$result = mysqli_fetch_array($query);
					function __getYouTubeEmbeddedURL($url) {
						return "https://www.youtube.com/embed/" . __getYouTubeID($url);
					}
					function __getYouTubeID($url) {
						$queryString = parse_url($url, PHP_URL_QUERY);
						parse_str($queryString, $params);
						if (isset($params['v']) && strlen($params['v']) > 0) {
							return $params['v'];
						} else {
							return "";
						}
					}
					$url = $result['link'];
					$embed_code = '<iframe width="100%" height="700" src="'.__getYouTubeEmbeddedURL($url).'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
					echo $embed_code;
					?>
                </div>
                <div class="col-lg-12">
                    <div class="project_details_content mt-2">
                        <h3><?php echo $result['judul']; ?></h3>
                        <p><?php echo $result['deskripsi']; ?></p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- project_details part end -->


    <!-- footer part start-->
	<?php include('../includes/footer.php');?>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <?php include('../includes/js.php');?>
    <!-- footer part end-->
</body>

</html>