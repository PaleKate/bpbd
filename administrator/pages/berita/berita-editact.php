<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('berita.php');
$judul=$_POST['judul'];
$tgl=$_POST['tgl'];
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
					// window.location = 'module=berita';
				// });
				// </script>";	
// }else{
$sql="UPDATE berita SET judul='$judul',deskripsi='$deskripsi', tgl='$tgl' WHERE id_berita='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'success',
			  title: 'Done',
			  text: 'Data Berhasil Diupdate'
			}).then(function() {
				window.location = 'module=berita';
			});
		</script>";
}else {
	echo "<script type='text/javascript'>
			Swal.fire({
			  icon: 'warning',
			  title: 'Oops',
			  text: 'Terjadi Kesalahan Update Data!'
			}).then(function() {
				window.location = 'module=berita';
			});
		</script>";
	}
}
// }
?>