<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('berita.php');
$id=bin2hex(random_bytes(20));
$judul=$_POST['judul'];
$tgl=$_POST['tgl'];
$deskripsi=$_POST['deskripsi'];
$gambar=$_FILES["gambar"]["name"];
move_uploaded_file($_FILES["gambar"]["tmp_name"],"../../images/berita/".$_FILES["gambar"]["name"]);
$sqlcek = "SELECT * FROM berita WHERE judul='$judul'";
$querycek = mysqli_query($koneksidb,$sqlcek);
	if(mysqli_num_rows($querycek)>0){
		echo "<script type='text/javascript'>
					Swal.fire({
					  icon: 'warning',
					  title: 'Oops',
					  text: 'Berita sudah ada silahkan Input Berita yang Lain!'
					  }).then(function() {
					window.location = 'module=berita';
				});
				</script>";	
}else{
	$sql 	= "INSERT INTO berita (id_berita, judul, deskripsi, tgl, gambar)
				VALUES ('$id','$judul','$deskripsi','$tgl','$gambar')";
	$query 	= mysqli_query($koneksidb,$sql);
	if($query){
		echo "<script type='text/javascript'>
				Swal.fire({
				  icon: 'success',
				  title: 'Done',
				  text: 'Data Berhasil diinput'
				}).then(function() {
					window.location = 'module=berita';
				});
			</script>";
	}else {
		echo "<script type='text/javascript'>
				Swal.fire({
				  icon: 'warning',
				  title: 'Oops',
				  text: 'Terjadi Kesalahan Input Data!'
				}).then(function() {
					window.location = 'module=berita';
				});
			</script>";}

	}
?>