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
<?php $page = "tahun"; ?>
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
                                Data Jenis Bencana
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
											<th class="text-center">Jenis Bencana</th>
											<th class="text-center" width="150px">Act</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$nomor=0;
											$sqlkat = "SELECT * FROM bencana ORDER BY bencana ASC";
											$querykat = mysqli_query($koneksidb,$sqlkat);
											while ($result = mysqli_fetch_array($querykat)){
												$nomor++;
										?>
										<tr>
											<td align="center"><?php echo $nomor;?></td>
											<td><?php echo htmlentities($result['bencana']);?></td>
											<td class="text-center">
												<button type="button" class="btn btn-warning btn-circle waves-effect waves-circle waves-float" 
														data-toggle="modal" data-target="#editModal<?php echo htmlentities($result['id_bencana']);?>">
													<i class="material-icons">mode_edit</i>
												</button>&nbsp;&nbsp;
												<!-- Large Size -->
												<div class="modal fade" id="editModal<?php echo htmlentities($result['id_bencana']);?>" tabindex="-1" role="dialog">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title" id="editModalLabel">Form Edit Data Jenis Bencana</h4>
															</div>
															<div class="modal-body">
																<form method="POST" action="module=jenis-bencana-edit">
																	<div class="form-group">
																		<label class="form-control-label" style="float:left;">
																			<b>Jenis Bencana</b><span style="color:red">*</span>
																		</label>
																		<div class="form-line">
																			<input type="hidden" name="id" 
																				value="<?php echo htmlentities($result['id_bencana']);?>">
																			<input type="text" name="bencana" class="form-control"
																				value="<?php echo htmlentities($result['bencana']);?>" required>
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
																window.location = 'jenis-bencana-del.php?id=<?php echo htmlentities($result['id_bencana']);?>';
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
											<h4 class="modal-title" id="inputModalLabel">Form Input Data Jenis Bencana</h4>
										</div>
										<div class="modal-body">
											<form method="POST" action="module=jenis-bencana-input">
												<div class="form-group">
													<label class="form-control-label"><b>Jenis Bencana</b><span style="color:red">*</span></label>
													<div class="form-line">
														<input type="text" name="bencana" class="form-control" placeholder="Masukan Jenis Bencana" required>
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
				window.location = 'jenis-bencana-delall.php';
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
                    columns: [ 0, 1,]
                }
            },
            {
                extend: 'pdfHtml5',
				orientation: 'landscape',
                exportOptions: {
                    columns: [ 0, 1,]
                }
            },
			{
                extend: 'print',
                exportOptions: {
                    columns: [ 0, 1,]
                }
            },
			{
				extend: 'csv'
			}],
				dom: 
			"<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
			"<'row'<'col-md-12'tr>>" +
			"<'row'<'col-md-5'i><'col-md-7'p>>",
				pageLength: 10
            });
			table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        });
    </script>
</body>
</html>
<?php }?>