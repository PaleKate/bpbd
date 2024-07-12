<?php
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
?>	
<!--::blog_part start::-->
<section class="blog_part section_padding">
	<div class="container">
		<div class="row ">
			<div class="col-xl-12">
				<div class="section_tittle">
					<h2>Berita Terkini</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php 
				$sqlkat = "SELECT * FROM berita ORDER BY tgl DESC LIMIT 3";
				$querykat = mysqli_query($koneksidb,$sqlkat);
				while ($result = mysqli_fetch_array($querykat)){
			?>
			<div class="col-sm-6 col-lg-4 col-xl-4">
				<div class="single-home-blog">
					<div class="card">
						<a href="pages/berita/berita-details?id=<?php echo htmlentities($result['id_berita']);?>">
							<img src="administrator/images/berita/<?php echo htmlentities($result['gambar']);?>" class="card-img-top" alt="blog">
						</a>
						<div class="card-body">
							<a href="pages/berita/berita-details?id=<?php echo htmlentities($result['id_berita']);?>">
								<h5 class="card-title"><?php echo htmlentities($result['judul']);?></h5>
							</a>
							<a href="pages/berita/berita-details?id=<?php echo htmlentities($result['id_berita']);?>" class="btn_3">read more</a>
						</div>
					</div>
				</div>
			</div>
				<?php }?>
		</div>
	</div>
</section>
<!--::blog_part end::-->
	
<footer class="footer-area">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-sm-6 col-md-4 col-xl-3">
				<div class="single-footer-widget footer_1">
					<a href="index"> <img src="img/bpbd-landscape.png" alt=""> </a>
					<p>Ayo tingkatkan edukasi kalian bersama kami agar dapat mempersiapkan tindakan dan cara yang harus dilakukan ketika menghdapi bencana</p>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 col-md-4">
				<div class="single-footer-widget footer_2">
					<h4>Layanan Kami</h4>
					<div class="contact_info">
						<ul>
							<li>
								<a href="#">Edukasi Bencana</a>
							</li>
							<li>
								<a href="#">Berita</a>
							</li>
							<li>
								<a href="#">Kebencanaan</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 col-md-4">
				<div class="single-footer-widget footer_2">
					<h4>Kontak Kami</h4>
					<div class="contact_info"> 
						<p><span> Alamat :</span> Jl. Perintis Kemerdekaan No.279, Karsamenak, Kec. Kawalu, Kab. Tasikmalaya, Jawa Barat 46182 </p>
						<p><span> Phone :</span> 0811-2101-113</p>
						<p><span> Email : </span>bpbd@tasikmalayakota.go.id </p>
					</div>
				</div>
			</div>
		</div>

	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="copyright_part_text text-center">
					<div class="row">
						<div class="col-lg-12">
							<p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>