<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('../includes/format_rupiah.php');
include('../includes/library.php');
if(strlen($_SESSION['alogin'])==0){	
header('location: ../../module=login');
} else{
?>	
<!DOCTYPE html>
<?php $page = "edukasi"; ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Database BPBD | Admin Dashboard</title>
    <?php include ('../includes/head.php'); ?>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <?php include ('../includes/header.php'); ?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <?php include ('../includes/sidebar.php'); ?>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Konten Video BPBD Kota Tasikmalaya
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
								<button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#inputModal">
                                    <i class="material-icons">library_add</i>
                                    <span>Tambah</span>
                                </button>&nbsp;
								<button type="button" class="btn btn-danger waves-effect" onclick="deleteall()">
									<i class="material-icons">delete_forever</i> 
									<span>Hapus Semua</span>
								</button><hr>
								<table class="display table table-striped table-bordered table-hover" width="100%" id="example-table" cellspacing="0">
									<thead>
										<tr>
											<th class="text-center" width="12px">No</th>
											<th class="text-center">Judul</th>
											<th class="text-center">Kategori</th>
											<th class="text-center" width="150px">Act</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$nomor = 0;
											$sqlkat = "SELECT konten.*, kategori FROM konten, kategori WHERE
													   konten.id_kategori=kategori.id_kategori ORDER BY judul ASC";
											$querykat = mysqli_query($koneksidb,$sqlkat);
											while ($result = mysqli_fetch_array($querykat)){
												$nomor++;
										?>
										<tr>
											<td align="center"><?php echo htmlentities($nomor);?></td>
											<td><?php echo $result['judul'];?></td>
											<td><?php echo $result['kategori'];?></td>
											<td class="text-center">
												<button type="button" class="btn btn-warning btn-circle waves-effect waves-circle waves-float" 
														data-toggle="modal" data-target="#editModal<?php echo htmlentities($result['id_konten']);?>">
													<i class="material-icons">mode_edit</i>
												</button>&nbsp;&nbsp;
												<!-- Large Size -->
												<div class="modal fade" id="editModal<?php echo htmlentities($result['id_konten']);?>" tabindex="-1" role="dialog">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title" id="editModalLabel">Form Edit Data Konten Video</h4>
															</div>
															<div class="modal-body">
																<form method="POST" action="module=edukasi-bencana-edit">
																	<div class="col-sm-6">
																		<div class="form-group">
																			<label class="form-control-label" style="float:left;"><b>Judul</b><span style="color:red">*</span></label>
																			<div class="form-line">
																				<input type="hidden" name="id[]" value="<?php echo htmlentities($result['id_konten']);?>">
																				<input type="text" name="judul" class="form-control" value="<?php echo htmlentities($result['judul']);?>" required>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group">
																			<label class="form-control-label" style="float:left;"><b>Kategori</b><span style="color:red">*</span></label>
																			<div class="form-line">
																				<select class="form-control kategori" name="kategori" style="width:100%;" required>
																					<option value="<?php echo htmlentities($result['id_kategori']);?>"><?php echo htmlentities($result['kategori']);?></option>
																					<?php
																						$mySql = "SELECT * FROM kategori ORDER BY kategori";
																						$myQry = mysqli_query($koneksidb, $mySql);
																						while ($myData = mysqli_fetch_array($myQry)) {
																							if ($myData['id_kategori']== $dataBahan) {
																							$cek = " selected";
																							} else { $cek=""; }
																							echo "<option value='$myData[id_kategori]' $cek>$myData[kategori] </option>";
																						}
																					?>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-12">
																		<div class="form-group">
																			<label class="form-control-label" style="float:left;"><b>URL</b><span style="color:red">*</span></label>
																			<div class="form-line">
																				<input type="text" name="link" class="form-control" value="<?php echo htmlentities($result['link']);?>" required>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-12">
																		<div class="form-group">
																			<label class="form-control-label"><b>Deskripsi</b><span style="color:red">*</span></label>
																			<div class="form-line">
																				<textarea type="text" class="form-control" name="deskripsi[<?php echo htmlentities($result['id_konten']);?>]" required><?php echo $result['deskripsi'];?></textarea>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-12">
																		<div class="form-group">
																			<img src="../../images/thumbnail/<?php echo htmlentities($result['thumbnail']);?>" width="200" height="120">
																			<div class="my-2"></div>
																				<a style="margin-top:10px;" class="btn btn-primary waves-effect" href="changeimage.php?imgid=<?php echo htmlentities($result['id_konten'])?>">Change</a>
																		</div>
																	</div>
															</div>
															<div class="modal-footer">
																<button type="submit" class="btn btn-primary waves-effect" name="submit">UPDATE</button>
																<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
															</div>
																</form>
														</div>
													</div>
												</div>
												<!-- #END Large Size -->
												<button type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float"
														onclick="Swal.fire({
															icon: 'warning',
															title: 'Sure',
															text: 'Apakah Kamu Yakin Akan Menghapusnya ?',
															showCancelButton: true,
															confirmButtonText: 'Ya Hapus',
																}).then((result) => {
																if (result.isConfirmed) {
																window.location = 'edukasi-bencana-del.php?id=<?php echo htmlentities($result['id_konten']);?>';
																}
															})">
													<i class="material-icons">delete</i>
												</button>
											</td>
										</tr>
											<?php }?>
									</tbody>
								</table>
							</div>
							<!-- Large Size -->
							<div class="modal fade" id="inputModal" tabindex="-1" role="dialog">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="inputModalLabel">Form Input Data Konten Video</h4>
										</div>
										<div class="modal-body">
											<form method="POST" action="module=edukasi-bencana-input" enctype="multipart/form-data">
												<div class="col-sm-6">
													<div class="form-group">
														<label class="form-control-label"><b>Judul</b><span style="color:red">*</span></label>
														<div class="form-line">
															<input type="text" name="judul" class="form-control" placeholder="Masukan Nama Pejabat" required>
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="form-control-label"><b>Kategori</b><span style="color:red">*</span></label>
														<div class="form-line">
															<select class="form-control kategori" name="kategori" style="width:100%;" required>
																<option></option>
																<?php
																	$mySql = "SELECT * FROM kategori ORDER BY kategori";
																	$myQry = mysqli_query($koneksidb, $mySql);
																	while ($myData = mysqli_fetch_array($myQry)) {
																		if ($myData['kategori']== $dataBahan) {
																		$cek = " selected";
																		} else { $cek=""; }
																		echo "<option value='$myData[id_kategori]' $cek>$myData[kategori] </option>";
																	}
																?>
															</select>
														</div>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group">
														<label class="form-control-label"><b>URL</b><span style="color:red">*</span></label>
														<div class="form-line">
															<input type="text" name="link" class="form-control" placeholder="Masukan URL Video Youtube" required>
														</div>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group">
														<label class="form-control-label"><b>Thumbnail</b><span style="color:red">*</span></label>
														<div class="form-line">
															<input type="file" name="thumbnail" class="form-control" accept="image/*" required>
														</div>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group">
														<label class="form-control-label"><b>Deskripsi</b><span style="color:red">*</span></label>
														<div class="form-line">
															<textarea type="text" class="form-control" name="deskripsi" required></textarea>
														</div>
													</div>
												</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary waves-effect" name="submit">SUBMIT</button>
											<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
										</div>
											</form>
									</div>
								</div>
							</div>
							<!-- #END Large Size -->
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</section>
	<?php include ('../includes/script.php'); ?>
	<script type="text/javascript">
        function deleteall() {
			Swal.fire({
			icon: 'warning',
			title: 'Sure',
			text: 'Apakah Kamu Yakin Akan Menghapus Semua Data ?',
			showCancelButton: true,
			confirmButtonText: 'Ya Hapus',
				}).then((result) => {
				if (result.isConfirmed) {
				window.location = 'profil-pejabat-delall.php';
				}
			})
		}
	</script>
	<script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
				lengthMenu:[
					[10,20,50,100,-1],
					[10,20,50,100,"All"]
					],
				buttons: [{
                extend: 'copyHtml5'
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
            },
            {
                extend: 'pdfHtml5',
				orientation: 'landscape',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
            },
			{
                extend: 'print',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
            },
			{
				extend: 'csv'
			}],
				dom: 
			"<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
			"<'row'<'col-md-12'tr>>" +
			"<'row'<'col-md-5'i><'col-md-7'p>>"
            });
			table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        })
    </script>
	<script>
		$('.kategori').select2({
        placeholder: "Pilih Kategori",
        allowClear: true
		});
	</script>
	<script>
		CKEDITOR.replace('deskripsi');
		<?php 
			$sqlkat = "SELECT * FROM konten ORDER BY judul ASC";
			$querykat = mysqli_query($koneksidb,$sqlkat);
			while ($result = mysqli_fetch_array($querykat)){
		?>
		CKEDITOR.replace('deskripsi[<?php echo htmlentities($result['id_konten']);?>]');
			<?php }?>
	</script>
</body>
</html>
<?php }?>