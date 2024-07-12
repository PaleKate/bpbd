<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('kebencanaan.php');
$id_kecamatan=$_POST['id_kecamatan'];
$id_bencana=$_POST['id_bencana'];
$kejadian=$_POST['kejadian'];
$id_tahun=$_POST['id_tahun'];
$id=$_POST['id'];
// $sqlcek = "SELECT kebencanaan FROM kebencanaan WHERE kebencanaan='$kebencanaan'";
// $querycek = mysqli_query($koneksidb,$sqlcek);
	// if(mysqli_num_rows($querycek)>0){
		// echo "<script type='text/javascript'>
					// Swal.fire({
					  // icon: 'warning',
					  // title: 'Oops',
					  // text: 'Nama kebencanaan Sudah Ada!'
					  // }).then(function() {
					// window.location = 'module=kebencanaan';
				// });
				// </script>";	
// }else{
$sql="UPDATE kebencanaan SET id_kecamatan='$id_kecamatan', id_bencana='$id_bencana', kejadian='$kejadian', id_tahun='$id_tahun' 
	  WHERE id_kebencanaan='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'success',
			  title: 'Done',
			  text: 'Data Berhasil Diupdate'
			}).then(function() {
				window.location = 'module=kebencanaan';
			});
		</script>";
}else {
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'warning',
			  title: 'Oops',
			  text: 'Terjadi Kesalahan Update Data!'
			}).then(function() {
				window.location = 'module=kebencanaan';
			});
		</script>";
	}
// }
?>