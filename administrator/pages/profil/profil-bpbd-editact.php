<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('profil-bpbd.php');
$deskripsi=$_POST['deskripsi'];
$hukum=$_POST['hukum'];
$id=$_POST['id'];
$sql="UPDATE profil_bpbd SET deskripsi='$deskripsi', hukum='$hukum' WHERE id_bpbd='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'success',
			  title: 'Done',
			  text: 'Data Berhasil Diupdate'
			}).then(function() {
				window.location = 'module=profil-bpbd';
			});
		</script>";
}else {
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'warning',
			  title: 'Oops',
			  text: 'Terjadi Kesalahan Update Data!'
			}).then(function() {
				window.location = 'module=profil-bpbd';
			});
		</script>";
	}
?>