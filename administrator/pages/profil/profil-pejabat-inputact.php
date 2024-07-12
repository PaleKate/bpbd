<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('profil-pejabat.php');
$id=bin2hex(random_bytes(20));
$nama_pejabat=$_POST['nama_pejabat'];
$jabatan=$_POST['jabatan'];
$foto=$_FILES["foto"]["name"];
move_uploaded_file($_FILES["foto"]["tmp_name"],"../../images/profil/".$_FILES["foto"]["name"]);
$sqlcek = "SELECT * FROM pejabat WHERE nama_pejabat='$nama_pejabat' OR id_jabatan='$jabatan'";
$querycek = mysqli_query($koneksidb,$sqlcek);
	if(mysqli_num_rows($querycek)>0){
		echo "<script type='text/javascript'>
					Swal.fire({
					  icon: 'warning',
					  title: 'Oops',
					  text: 'Nama Pejabat atau Jabatan sudah ada silahkan Isi Data yang Lain!'
					  }).then(function() {
					window.location = 'module=profil-pejabat';
				});
				</script>";	
}else{
	$sql 	= "INSERT INTO pejabat (id_pejabat, nama_pejabat, id_jabatan, foto)
				VALUES ('$id','$nama_pejabat','$jabatan','$foto')";
	$query 	= mysqli_query($koneksidb,$sql);
	if($query){
		echo "<script type='text/javascript'>
				Swal.fire({
				  icon: 'success',
				  title: 'Done',
				  text: 'Data Berhasil diinput'
				}).then(function() {
					window.location = 'module=profil-pejabat';
				});
			</script>";
	}else {
		echo "<script type='text/javascript'>
				Swal.fire({
				  icon: 'warning',
				  title: 'Oops',
				  text: 'Terjadi Kesalahan Input Data!'
				}).then(function() {
					window.location = 'module=profil-pejabat';
				});
			</script>";}

	}
?>