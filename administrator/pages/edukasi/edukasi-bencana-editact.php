<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('edukasi-bencana.php');
$judul=$_POST['judul'];
$kategori=$_POST['kategori'];
$link=$_POST['link'];
$ids=$_POST['id'];
$deskripsies=$_POST['deskripsi'];
foreach ($ids as $index => $id) {
    // Escape data untuk menghindari SQL injection
    $id = $koneksidb->real_escape_string($id);
    $deskripsi = $koneksidb->real_escape_string($deskripsies[$id]);
// $sqlcek = "SELECT nama_pejabat,id_jabatan FROM pejabat WHERE nama_pejabat='$nama_pejabat' OR id_jabatan='$jabatan'";
// $querycek = mysqli_query($koneksidb,$sqlcek);
	// if(mysqli_num_rows($querycek)>0){
		// echo "<script type='text/javascript'>
					// Swal.fire({
					  // icon: 'warning',
					  // title: 'Oops',
					  // text: 'Nama Pejabat Atau Jabatan Sudah Ada!'
					  // }).then(function() {
					// window.location = 'module=edukasi-bencana';
				// });
				// </script>";	
// }else{
$sql="UPDATE konten SET judul='$judul', link='$link', deskripsi='$deskripsi', id_kategori='$kategori' WHERE id_konten='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'success',
			  title: 'Done',
			  text: 'Data Berhasil Diupdate'
			}).then(function() {
				window.location = 'module=edukasi-bencana';
			});
		</script>";
}else {
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'warning',
			  title: 'Oops',
			  text: 'Terjadi Kesalahan Update Data!'
			}).then(function() {
				window.location = 'module=edukasi-bencana';
			});
		</script>";
	}
}
// }
?>