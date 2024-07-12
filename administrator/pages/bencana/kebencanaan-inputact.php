<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('kebencanaan.php');
$id=bin2hex(random_bytes(20));
$id_kecamatan=$_POST['id_kecamatan'];
$id_bencana=$_POST['id_bencana'];
$kejadian=$_POST['kejadian'];
$id_tahun=$_POST['id_tahun'];
$sqlcek = "SELECT id_kecamatan,id_bencana FROM kebencanaan WHERE id_kecamatan='$id_kecamatan' AND id_bencana='$id_bencana' 
		   AND id_tahun='$id_tahun'";
$querycek = mysqli_query($koneksidb,$sqlcek);
	if(mysqli_num_rows($querycek)>0){
		echo "<script type='text/javascript'>
					Swal.fire({
					  icon: 'warning',
					  title: 'Oops',
					  text: 'Data Tersebut Sudah Ada Silahkan Lakukan Update Data!'
					  }).then(function() {
					window.location = 'module=kebencanaan';
				});
				</script>";	
}else{
	$sql 	= "INSERT INTO kebencanaan (id_kebencanaan, id_kecamatan, id_bencana, kejadian, id_tahun)
				VALUES ('$id','$id_kecamatan','$id_bencana','$kejadian','$id_tahun')";
	$query 	= mysqli_query($koneksidb,$sql);
	if($query){
		echo "<script type='text/javascript'>
				Swal.fire({
				  icon: 'success',
				  title: 'Done',
				  text: 'Data Berhasil diinput'
				}).then(function() {
					window.location = 'module=kebencanaan';
				});
			</script>";
	}else {
		echo "<script type='text/javascript'>
				Swal.fire({
				  icon: 'warning',
				  title: 'Oops',
				  text: 'Terjadi Kesalahan Input Data!'
				}).then(function() {
					window.location = 'module=kebencanaan';
				});
			</script>";}

	}
?>