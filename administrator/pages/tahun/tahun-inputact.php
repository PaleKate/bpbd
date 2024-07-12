<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('tahun.php');
$id=bin2hex(random_bytes(20));
$tahun=$_POST['tahun'];
$sqlcek = "SELECT tahun FROM tahun WHERE tahun='$tahun'";
$querycek = mysqli_query($koneksidb,$sqlcek);
	if(mysqli_num_rows($querycek)>0){
		echo "<script type='text/javascript'>
					Swal.fire({
					  icon: 'warning',
					  title: 'Oops',
					  text: 'Tahun Sudah Ada!'
					  }).then(function() {
					window.location = 'module=tahun';
				});
				</script>";	
}else{
	$sql 	= "INSERT INTO tahun (id_tahun, tahun)
				VALUES ('$id','$tahun')";
	$query 	= mysqli_query($koneksidb,$sql);
	if($query){
		echo "<script type='text/javascript'>
				Swal.fire({
				  icon: 'success',
				  title: 'Done',
				  text: 'Data Berhasil diinput'
				}).then(function() {
					window.location = 'module=tahun';
				});
			</script>";
	}else {
		echo "<script type='text/javascript'>
				Swal.fire({
				  icon: 'warning',
				  title: 'Oops',
				  text: 'Terjadi Kesalahan Input Data!'
				}).then(function() {
					window.location = 'module=tahun';
				});
			</script>";}

	}
?>