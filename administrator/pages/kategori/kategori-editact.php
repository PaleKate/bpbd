<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('kategori.php');
$kategori=$_POST['kategori'];
$id=$_POST['id'];
// $sqlcek = "SELECT kategori FROM kategori WHERE kategori='$kategori'";
// $querycek = mysqli_query($koneksidb,$sqlcek);
	// if(mysqli_num_rows($querycek)>0){
		// echo "<script type='text/javascript'>
					// Swal.fire({
					  // icon: 'warning',
					  // title: 'Oops',
					  // text: 'Nama kategori Sudah Ada!'
					  // }).then(function() {
					// window.location = 'module=kategori';
				// });
				// </script>";	
// }else{
$sql="UPDATE kategori SET kategori='$kategori' WHERE id_kategori='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'success',
			  title: 'Done',
			  text: 'Data Berhasil Diupdate'
			}).then(function() {
				window.location = 'module=kategori';
			});
		</script>";
}else {
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'warning',
			  title: 'Oops',
			  text: 'Terjadi Kesalahan Update Data!'
			}).then(function() {
				window.location = 'module=kategori';
			});
		</script>";
	}
// }
?>