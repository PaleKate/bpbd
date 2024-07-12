<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('jenis-bencana.php');
$bencana=$_POST['bencana'];
$id=$_POST['id'];
// $sqlcek = "SELECT bencana FROM bencana WHERE bencana='$bencana'";
// $querycek = mysqli_query($koneksidb,$sqlcek);
	// if(mysqli_num_rows($querycek)>0){
		// echo "<script type='text/javascript'>
					// Swal.fire({
					  // icon: 'warning',
					  // title: 'Oops',
					  // text: 'Nama bencana Sudah Ada!'
					  // }).then(function() {
					// window.location = 'module=bencana';
				// });
				// </script>";	
// }else{
$sql="UPDATE bencana SET bencana='$bencana' WHERE id_bencana='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'success',
			  title: 'Done',
			  text: 'Data Berhasil Diupdate'
			}).then(function() {
				window.location = 'module=jenis-bencana';
			});
		</script>";
}else {
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'warning',
			  title: 'Oops',
			  text: 'Terjadi Kesalahan Update Data!'
			}).then(function() {
				window.location = 'module=jenis-bencana';
			});
		</script>";
	}
// }
?>