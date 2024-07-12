<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('edukasi-bencana.php');
$id=bin2hex(random_bytes(20));
$judul=$_POST['judul'];
$kategori=$_POST['kategori'];
$link=$_POST['link'];
$deskripsi=$_POST['deskripsi'];
$thumbnail=$_FILES["thumbnail"]["name"];
move_uploaded_file($_FILES["thumbnail"]["tmp_name"],"../../images/thumbnail/".$_FILES["thumbnail"]["name"]);
$sqlcek = "SELECT * FROM konten WHERE judul='$judul'";
$querycek = mysqli_query($koneksidb,$sqlcek);
	if(mysqli_num_rows($querycek)>0){
		echo "<script type='text/javascript'>
					Swal.fire({
					  icon: 'warning',
					  title: 'Oops',
					  text: 'Judul Konten sudah ada silahkan Input Konten yang Lain!'
					  }).then(function() {
					window.location = 'module=edukasi-bencana';
				});
				</script>";	
}else{
	$sql 	= "INSERT INTO konten (id_konten, judul, thumbnail, link, deskripsi, id_kategori)
				VALUES ('$id','$judul','$thumbnail','$link','$deskripsi','$kategori')";
	$query 	= mysqli_query($koneksidb,$sql);
	if($query){
		echo "<script type='text/javascript'>
				Swal.fire({
				  icon: 'success',
				  title: 'Done',
				  text: 'Data Berhasil diinput'
				}).then(function() {
					window.location = 'module=edukasi-bencana';
				});
			</script>";
	}else {
		echo "<script type='text/javascript'>
				Swal.fire({
				  icon: 'warning',
				  title: 'Oops',
				  text: 'Terjadi Kesalahan Input Data!'
				}).then(function() {
					window.location = 'module=edukasi-bencana';
				});
			</script>";}

	}
?>