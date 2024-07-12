<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('kontak.php');
$alamat=$_POST['alamat'];
$nomor=$_POST['nomor'];
$email=$_POST['email'];
$lokasi=$_POST['lokasi'];
$id=$_POST['id'];
$sql="UPDATE kontak SET alamat='$alamat', nomor='$nomor', email='$email', lokasi='$lokasi' WHERE id_kontak='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'success',
			  title: 'Done',
			  text: 'Data Berhasil Diupdate'
			}).then(function() {
				window.location = 'module=kontak-kami';
			});
		</script>";
}else {
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'warning',
			  title: 'Oops',
			  text: 'Terjadi Kesalahan Update Data!'
			}).then(function() {
				window.location = 'module=kontak-kami';
			});
		</script>";
	}
?>