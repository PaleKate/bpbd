<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('tahun.php');
$tahun=$_POST['tahun'];
$id=$_POST['id'];
// $sqlcek = "SELECT tahun FROM tahun WHERE tahun='$tahun'";
// $querycek = mysqli_query($koneksidb,$sqlcek);
	// if(mysqli_num_rows($querycek)>0){
		// echo "<script type='text/javascript'>
					// Swal.fire({
					  // icon: 'warning',
					  // title: 'Oops',
					  // text: 'Nama tahun Sudah Ada!'
					  // }).then(function() {
					// window.location = 'module=tahun';
				// });
				// </script>";	
// }else{
$sql="UPDATE tahun SET tahun='$tahun' WHERE id_tahun='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'success',
			  title: 'Done',
			  text: 'Data Berhasil Diupdate'
			}).then(function() {
				window.location = 'module=tahun';
			});
		</script>";
}else {
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'warning',
			  title: 'Oops',
			  text: 'Terjadi Kesalahan Update Data!'
			}).then(function() {
				window.location = 'module=tahun';
			});
		</script>";
	}
// }
?>