<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('jabatan.php');
$jabatan=$_POST['jabatan'];
$id=$_POST['id'];
// $sqlcek = "SELECT jabatan FROM jabatan WHERE jabatan='$jabatan'";
// $querycek = mysqli_query($koneksidb,$sqlcek);
	// if(mysqli_num_rows($querycek)>0){
		// echo "<script type='text/javascript'>
					// Swal.fire({
					  // icon: 'warning',
					  // title: 'Oops',
					  // text: 'Nama Jabatan Sudah Ada!'
					  // }).then(function() {
					// window.location = 'module=jabatan';
				// });
				// </script>";	
// }else{
$sql="UPDATE jabatan SET jabatan='$jabatan' WHERE id_jabatan='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'success',
			  title: 'Done',
			  text: 'Data Berhasil Diupdate'
			}).then(function() {
				window.location = 'module=jabatan';
			});
		</script>";
}else {
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'warning',
			  title: 'Oops',
			  text: 'Terjadi Kesalahan Update Data!'
			}).then(function() {
				window.location = 'module=jabatan';
			});
		</script>";
	}
// }
?>