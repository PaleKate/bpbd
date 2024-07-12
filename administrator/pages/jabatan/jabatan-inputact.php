<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('jabatan.php');
$id=bin2hex(random_bytes(20));
$jabatan=$_POST['jabatan'];
$sqlcek = "SELECT jabatan FROM jabatan WHERE jabatan='$jabatan'";
$querycek = mysqli_query($koneksidb,$sqlcek);
	if(mysqli_num_rows($querycek)>0){
		echo "<script type='text/javascript'>
					Swal.fire({
					  icon: 'warning',
					  title: 'Oops',
					  text: 'Nama Jabatan Sudah Ada!'
					  }).then(function() {
					window.location = 'module=jabatan';
				});
				</script>";	
}else{
	$sql 	= "INSERT INTO jabatan (id_jabatan, jabatan)
				VALUES ('$id','$jabatan')";
	$query 	= mysqli_query($koneksidb,$sql);
	if($query){
		echo "<script type='text/javascript'>
				Swal.fire({
				  icon: 'success',
				  title: 'Done',
				  text: 'Data Berhasil diinput'
				}).then(function() {
					window.location = 'module=jabatan';
				});
			</script>";
	}else {
		echo "<script type='text/javascript'>
				Swal.fire({
				  icon: 'warning',
				  title: 'Oops',
				  text: 'Terjadi Kesalahan Input Data!'
				}).then(function() {
					window.location = 'module=jabatan';
				});
			</script>";}

	}
?>