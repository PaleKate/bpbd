<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('jenis-bencana.php');
$id=bin2hex(random_bytes(20));
$bencana=$_POST['bencana'];
$sqlcek = "SELECT bencana FROM bencana WHERE bencana='$bencana'";
$querycek = mysqli_query($koneksidb,$sqlcek);
	if(mysqli_num_rows($querycek)>0){
		echo "<script type='text/javascript'>
					Swal.fire({
					  icon: 'warning',
					  title: 'Oops',
					  text: 'Jenis Bencana Sudah Ada!'
					  }).then(function() {
					window.location = 'module=jenis-bencana';
				});
				</script>";	
}else{
	$sql 	= "INSERT INTO bencana (id_bencana, bencana)
				VALUES ('$id','$bencana')";
	$query 	= mysqli_query($koneksidb,$sql);
	if($query){
		echo "<script type='text/javascript'>
				Swal.fire({
				  icon: 'success',
				  title: 'Done',
				  text: 'Data Berhasil diinput'
				}).then(function() {
					window.location = 'module=jenis-bencana';
				});
			</script>";
	}else {
		echo "<script type='text/javascript'>
				Swal.fire({
				  icon: 'warning',
				  title: 'Oops',
				  text: 'Terjadi Kesalahan Input Data!'
				}).then(function() {
					window.location = 'module=jenis-bencana';
				});
			</script>";}

	}
?>