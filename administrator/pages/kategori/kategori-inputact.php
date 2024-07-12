<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('kategori.php');
$id=bin2hex(random_bytes(20));
$kategori=$_POST['kategori'];
$sqlcek = "SELECT kategori FROM kategori WHERE kategori='$kategori'";
$querycek = mysqli_query($koneksidb,$sqlcek);
	if(mysqli_num_rows($querycek)>0){
		echo "<script type='text/javascript'>
					Swal.fire({
					  icon: 'warning',
					  title: 'Oops',
					  text: 'Nama Kategori Sudah Ada!'
					  }).then(function() {
					window.location = 'module=kategori';
				});
				</script>";	
}else{
	$sql 	= "INSERT INTO kategori (id_kategori, kategori)
				VALUES ('$id','$kategori')";
	$query 	= mysqli_query($koneksidb,$sql);
	if($query){
		echo "<script type='text/javascript'>
				Swal.fire({
				  icon: 'success',
				  title: 'Done',
				  text: 'Data Berhasil diinput'
				}).then(function() {
					window.location = 'module=kategori';
				});
			</script>";
	}else {
		echo "<script type='text/javascript'>
				Swal.fire({
				  icon: 'warning',
				  title: 'Oops',
				  text: 'Terjadi Kesalahan Input Data!'
				}).then(function() {
					window.location = 'module=kategori';
				});
			</script>";}

	}
?>