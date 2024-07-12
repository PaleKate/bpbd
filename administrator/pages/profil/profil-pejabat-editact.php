<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('profil-pejabat.php');
$nama_pejabat=$_POST['nama_pejabat'];
$jabatan=$_POST['jabatan'];
$id=$_POST['id'];
// $sqlcek = "SELECT nama_pejabat,id_jabatan FROM pejabat WHERE nama_pejabat='$nama_pejabat' OR id_jabatan='$jabatan'";
// $querycek = mysqli_query($koneksidb,$sqlcek);
	// if(mysqli_num_rows($querycek)>0){
		// echo "<script type='text/javascript'>
					// Swal.fire({
					  // icon: 'warning',
					  // title: 'Oops',
					  // text: 'Nama Pejabat Atau Jabatan Sudah Ada!'
					  // }).then(function() {
					// window.location = 'module=profil-pejabat';
				// });
				// </script>";	
// }else{
$sql="UPDATE pejabat SET nama_pejabat='$nama_pejabat',id_jabatan='$jabatan' WHERE id_pejabat='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'success',
			  title: 'Done',
			  text: 'Data Berhasil Diupdate'
			}).then(function() {
				window.location = 'module=profil-pejabat';
			});
		</script>";
}else {
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'warning',
			  title: 'Oops',
			  text: 'Terjadi Kesalahan Update Data!'
			}).then(function() {
				window.location = 'module=profil-pejabat';
			});
		</script>";
	}
// }
?>