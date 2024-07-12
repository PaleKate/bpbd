<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('visi-misi.php');
$visi=$_POST['visi'];
$misi=$_POST['misi'];
$id=$_POST['id'];
$sql="UPDATE visi_misi SET visi='$visi', misi='$misi' WHERE id_visi_misi='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'success',
			  title: 'Done',
			  text: 'Data Berhasil Diupdate'
			}).then(function() {
				window.location = 'module=visi-misi';
			});
		</script>";
}else {
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'warning',
			  title: 'Oops',
			  text: 'Terjadi Kesalahan Update Data!'
			}).then(function() {
				window.location = 'module=visi-misi';
			});
		</script>";
	}
?>