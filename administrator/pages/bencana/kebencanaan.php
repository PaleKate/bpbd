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
<?php $page = "kebencanaan"; ?>
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
							<?php 
								if(isset($_POST['cari'])){
									$id_tahun = $_POST['tahun'];
									$sqlkat = "SELECT kebencanaan.*, kecamatan.*, bencana.*, tahun.* FROM kebencanaan, kecamatan, bencana, tahun WHERE 
											   kebencanaan.id_kecamatan=kecamatan.id_kecamatan AND kebencanaan.id_bencana=bencana.id_bencana AND 
											   kebencanaan.id_tahun=tahun.id_tahun AND tahun.id_tahun='$id_tahun' ORDER BY kecamatan, bencana ASC";
									$querykat = mysqli_query($koneksidb,$sqlkat);
									$tahun = mysqli_fetch_array($querykat);
							?>
							<h2>
                                Data Kejadian Bencana Berdasarkan Jenis Bencana di Kota Tasikmalaya Tahun <?php echo $tahun['tahun']; ?>
                            </h2>
							<?php }else{ ?>
							<h2>
                                Data Kejadian Bencana Berdasarkan Jenis Bencana di Kota Tasikmalaya
                            </h2>
							<?php }?>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
								<div class="col-md-6">
									<button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#inputModal">
										<i class="material-icons">library_add</i>
										<span>Tambah</span>
									</button>&nbsp;
									<button type="button" class="btn btn-danger waves-effect" onclick="deleteall()">
										<i class="material-icons">delete_forever</i> 
										<span>Hapus Semua</span>
									</button><hr>
								</div>
								<form method="POST" name="periode" onSubmit="return valid();">
									<div class="row clearfix">
										<div class="col-md-4">
											<div class="form-group">
												<select class="form-control tahun" name="tahun" required>
													<option></option>
													<?php
														$mySql = "SELECT * FROM tahun ORDER BY tahun DESC";
														$myQry = mysqli_query($koneksidb, $mySql);
														while ($myData = mysqli_fetch_array($myQry)) {
															if ($myData['id_tahun']== $dataBahan) {
															$cek = " selected";
															} else { $cek=""; }
															echo "<option value='$myData[id_tahun]' $cek>$myData[tahun] </option>";
														}
													?>
												</select>
											</div>
										</div>
										<div class="col-md-2">
											<button type="submit" name="cari" class="btn btn-warning waves-effect">
												<i class="material-icons">search</i> 
												<span>Cari</span>
											</button>
										</div>
									</div>
								</form>
								<table class="display table table-striped table-bordered table-hover" width="100%" id="example-table" cellspacing="0">
									<thead>
										<tr>
											<th class="text-center" width="12px">No</th>
											<th class="text-center">Kecamatan</th>
											<th class="text-center">Jenis Bencana</th>
											<th class="text-center">Kejadian</th>
											<th class="text-center">Tahun</th>
											<th class="text-center" width="150px">Act</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											if(isset($_POST['cari'])){
												$tahun = $_POST['tahun'];
												$nomor=0;
												$sqlkat = "SELECT kebencanaan.*, kecamatan.*, bencana.*, tahun.* FROM kebencanaan, kecamatan, bencana, tahun WHERE 
														   kebencanaan.id_kecamatan=kecamatan.id_kecamatan AND kebencanaan.id_bencana=bencana.id_bencana AND 
														   kebencanaan.id_tahun=tahun.id_tahun AND tahun.id_tahun='$tahun' ORDER BY kecamatan, bencana ASC";
												}else{
													$sqlkat = "SELECT kebencanaan.*, kecamatan.*, bencana.*, tahun.* FROM kebencanaan, kecamatan, bencana, tahun WHERE 
														   kebencanaan.id_kecamatan=kecamatan.id_kecamatan AND kebencanaan.id_bencana=bencana.id_bencana AND 
														   kebencanaan.id_tahun=tahun.id_tahun AND tahun.id_tahun='$tahun' ORDER BY kecamatan, bencana ASC";
													}
												$querykat = mysqli_query($koneksidb,$sqlkat);
												while ($result = mysqli_fetch_array($querykat)){
													$nomor++;
										?>
										<tr>
											<td align="center"><?php echo $nomor;?></td>
											<td><?php echo htmlentities($result['kecamatan']);?></td>
											<td><?php echo htmlentities($result['bencana']);?></td>
											<td class="text-center"><?php echo htmlentities($result['kejadian']);?></td>
											<td class="text-center"><?php echo htmlentities($result['tahun']);?></td>
											<td class="text-center">
												<button type="button" class="btn btn-warning btn-circle waves-effect waves-circle waves-float" 
														data-toggle="modal" data-target="#editModal<?php echo htmlentities($result['id_kebencanaan']);?>">
													<i class="material-icons">mode_edit</i>
												</button>&nbsp;&nbsp;
												<!-- Large Size -->
												<div class="modal fade" id="editModal<?php echo htmlentities($result['id_kebencanaan']);?>" tabindex="-1" role="dialog">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title" id="editModalLabel">Form Edit Data Kejadian Bencana</h4>
															</div>
															<div class="modal-body">
																<form method="POST" action="module=kebencanaan-edit">
																	<div class="col-sm-6">
																		<div class="form-group">
																			<label class="form-control-label" style="float:left;"><b>Kecamatan</b><span style="color:red">*</span></label>
																			<div style="text-align:left;">
																				<select class="form-control kecamatan" name="id_kecamatan" style="width:100%;" required>
																					<option value="<?php echo htmlentities($result['id_kecamatan']);?>"><?php echo htmlentities($result['kecamatan']);?></option>
																					<?php
																						$mySql = "SELECT * FROM kecamatan ORDER BY kecamatan";
																						$myQry = mysqli_query($koneksidb, $mySql);
																						while ($myData = mysqli_fetch_array($myQry)) {
																							if ($myData['id_kecamatan']== $dataBahan) {
																							$cek = " selected";
																							} else { $cek=""; }
																							echo "<option value='$myData[id_kecamatan]' $cek>$myData[kecamatan] </option>";
																						}
																					?>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group">
																			<label class="form-control-label" style="float:left;"><b>Tahun</b><span style="color:red">*</span></label>
																			<div style="text-align:left;">
																				<select class="form-control tahun" name="id_tahun" style="width:100%;" required>
																					<option value="<?php echo htmlentities($result['id_tahun']);?>"><?php echo htmlentities($result['tahun']);?></option>
																					<?php
																						$mySql = "SELECT * FROM tahun ORDER BY tahun";
																						$myQry = mysqli_query($koneksidb, $mySql);
																						while ($myData = mysqli_fetch_array($myQry)) {
																							if ($myData['id_tahun']== $dataBahan) {
																							$cek = " selected";
																							} else { $cek=""; }
																							echo "<option value='$myData[id_tahun]' $cek>$myData[tahun] </option>";
																						}
																					?>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-6">
																		<div class="form-group">
																			<label class="form-control-label" style="float:left;"><b>Jenis Bencana</b><span style="color:red">*</span></label>
																			<div style="text-align:left;">
																				<select class="form-control bencana" name="id_bencana" style="width:100%;" required>
																					<option value="<?php echo htmlentities($result['id_bencana']);?>"><?php echo htmlentities($result['bencana']);?></option>
																					<?php
																						$mySql = "SELECT * FROM bencana ORDER BY bencana";
																						$myQry = mysqli_query($koneksidb, $mySql);
																						while ($myData = mysqli_fetch_array($myQry)) {
																							if ($myData['id_bencana']== $dataBahan) {
																							$cek = " selected";
																							} else { $cek=""; }
																							echo "<option value='$myData[id_bencana]' $cek>$myData[bencana] </option>";
																						}
																					?>
																				</select>
																			</div>
																		</div>
																</div>
																<div class="col-lg-6">
																	<div class="form-group">
																		<label class="form-control-label" style="float:left;"><b>Jumlah Kejadian</b><span style="color:red">*</span>
																		</label>
																		<div class="form-line">
																			<input type="hidden" name="id" value="<?php echo htmlentities($result['id_kebencanaan']);?>">
																			<input type="number" name="kejadian" class="form-control" min=0 value="<?php echo htmlentities($result['kejadian']);?>" required>
																		</div>
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
																window.location = 'kebencanaan-del.php?id=<?php echo htmlentities($result['id_kebencanaan']);?>';
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
											<h4 class="modal-title" id="inputModalLabel">Form Input Data Kejadian Bencana</h4>
										</div>
										<div class="modal-body">
											<form method="POST" action="module=kebencanaan-input">
												<div class="col-sm-6">
													<div class="form-group">
														<label class="form-control-label"><b>Kecamatan</b><span style="color:red">*</span></label>
														<div class="form-line">
															<select class="form-control kecamatan" name="id_kecamatan" style="width:100%;" required>
																<option></option>
																<?php
																	$mySql = "SELECT * FROM kecamatan ORDER BY kecamatan";
																	$myQry = mysqli_query($koneksidb, $mySql);
																	while ($myData = mysqli_fetch_array($myQry)) {
																		if ($myData['id_kecamatan']== $dataBahan) {
																		$cek = " selected";
																		} else { $cek=""; }
																		echo "<option value='$myData[id_kecamatan]' $cek>$myData[kecamatan] </option>";
																	}
																?>
															</select>
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label class="form-control-label"><b>Tahun</b><span style="color:red">*</span></label>
														<div class="form-line">
															<select class="form-control tahun" name="id_tahun" style="width:100%;" required>
																<option></option>
																<?php
																	$mySql = "SELECT * FROM tahun ORDER BY tahun DESC";
																	$myQry = mysqli_query($koneksidb, $mySql);
																	while ($myData = mysqli_fetch_array($myQry)) {
																		if ($myData['id_tahun']== $dataBahan) {
																		$cek = " selected";
																		} else { $cek=""; }
																		echo "<option value='$myData[id_tahun]' $cek>$myData[tahun] </option>";
																	}
																?>
															</select>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label class="form-control-label"><b>Jenis Bencana</b><span style="color:red">*</span></label>
														<div class="form-line">
															<select class="form-control bencana" name="id_bencana" style="width:100%;" required>
																<option></option>
																<?php
																	$mySql = "SELECT * FROM bencana ORDER BY bencana";
																	$myQry = mysqli_query($koneksidb, $mySql);
																	while ($myData = mysqli_fetch_array($myQry)) {
																		if ($myData['id_bencana']== $dataBahan) {
																		$cek = " selected";
																		} else { $cek=""; }
																		echo "<option value='$myData[id_bencana]' $cek>$myData[bencana] </option>";
																	}
																?>
															</select>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label class="form-control-label"><b>Jumlah Kejadian</b><span style="color:red">*</span></label>
														<div class="form-line">
															<input type="number" name="kejadian" class="form-control" min=0 value="0" required>
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
				window.location = 'kebencanaan-delall.php';
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
				searchable: true,
				order: [1, 'asc'],
				rowGroup: {
					dataSrc: [function ( row ) {
						var kec = (row[1]);
						return "Kecamatan " + kec;
					}]
					
				},
				columnDefs: [ {
					targets: [ 1 ],
					visible: false
					} ],
				pageLength: 10
            });
			table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        })
    </script>
	<script>
		$('.kecamatan').select2({
        placeholder: "Pilih Kecamatan"
		});
		
		$('.bencana').select2({
        placeholder: "Pilih Jenis Bencana"
		});
		
		$('.tahun').select2({
        placeholder: "Pilih Tahun"
		});
	</script>
</body>
</html>
<?php }?>