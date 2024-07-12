<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/format_rupiah.php');
include('includes/library.php');
if(strlen($_SESSION['alogin'])==0){	
header('location: module=login');
} else{
?>	
<!DOCTYPE html>
<?php $page = "dashboard"; ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Database PSDA | Admin Dashboard</title>
	<?php include ('includes/head.php'); ?>
</head>

<body class="theme-red">
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <?php include ('includes/header.php'); ?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <?php include ('includes/sidebar.php'); ?>
        <!-- #END# Left Sidebar -->
    </section>
	
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">folder_open</i>
                        </div>
                        <div class="content">
                            <div class="text" style="font-size:12px;">BENCANA</div>
                            <div class="number count-to" data-from="0" data-to="247" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">healing</i>
                        </div>
                        <div class="content">
                            <div class="text" style="font-size:12px;">MENGUNGSI</div>
                            <div class="number count-to" data-from="0" data-to="68" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hospital</i>
                        </div>
                        <div class="content">
                            <div class="text" style="font-size:12px;">TERDAMPAK</div>
                            <div class="number count-to" data-from="0" data-to="1132" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">error</i>
                        </div>
                        <div class="content">
                            <div class="text" style="font-size:12px;">MENINGGAL</div>
                            <div class="number count-to" data-from="0" data-to="0" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
			<!-- Bar Chart Usage -->
            <div class="row clearfix">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Silahkan Pilih Tahun Untuk Menampilkan Data</h2>
                        </div>
                        <div class="body">
						  <div class="row clearfix">
							<form method="POST" name="periode" onSubmit="return valid();">
								<div class="col-sm-12">
									<div class="form-group">
										<select class="form-control tahun" name="tahun" style="width:100%;" required>
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
								<div class="col-sm-12">
									<button type="submit" name="cari" class="btn btn-block bg-red waves-effect">
										<i class="material-icons">search</i> 
										<span>Search</span>
									</button>
								</div>
							</form>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php 
				if(isset($_POST['cari'])){
					$tahun = $_POST['tahun'];
						$sqlthn = "SELECT * FROM tahun WHERE id_tahun='$tahun'";
						$querythn = mysqli_query($koneksidb,$sqlthn);
						$thn = mysqli_fetch_array($querythn);
			?>
            <!-- #END# Bar Chart Usage -->
            <!-- Bar Chart Usage -->
            <div class="row clearfix">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Statistik Jumlah Bencana Tahun <?php echo $thn['tahun']; ?></h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <canvas id="bar_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Bar Chart Usage -->

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>Total Bencana Berdasarkan Jenis Bencana Tahun <?php echo $thn['tahun']; ?></h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Bencana</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php	
											$nomor = 0;
											$tahun = $_POST['tahun'];
												$sqlbnc = "SELECT bencana, SUM(kejadian) FROM kebencanaan,bencana 
														   WHERE kebencanaan.id_bencana=bencana.id_bencana AND 
														   kebencanaan.id_tahun='$tahun' GROUP BY bencana.bencana";
												$querybnc = mysqli_query($koneksidb,$sqlbnc);
												while($bnc = mysqli_fetch_array($querybnc)){
													$nomor++;
										?>
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $bnc['bencana']; ?></td>
                                            <td><?php echo $bnc['SUM(kejadian)']; ?></td>
                                            <td><?php if ($bnc['SUM(kejadian)']<50){?>
												<span class="label bg-green">Rendah</span>
												
												<?php }else{ if(($bnc['SUM(kejadian)']>50)&&($bnc['SUM(kejadian)']<99)){?>
												<span class="label bg-orange">Sedang</span>
												
												<?php }else{ if($bnc['SUM(kejadian)']>100){?>
												<span class="label bg-red">Tinggi</span>
												
												<?php }}}?>
											</td>
                                            <td>
                                                <div class="progress">
													<?php if ($bnc['SUM(kejadian)']<50){?>
													<div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?php echo $bnc['SUM(kejadian)']; ?>" 
													aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $bnc['SUM(kejadian)']; ?>%"></div>
													
													<?php }else{ if(($bnc['SUM(kejadian)']>50)&&($bnc['SUM(kejadian)']<99)){?>
													<div class="progress-bar bg-orange" role="progressbar" aria-valuenow="<?php echo $bnc['SUM(kejadian)']; ?>" 
													aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $bnc['SUM(kejadian)']; ?>%"></div>
													
													<?php }else{ if($bnc['SUM(kejadian)']>100){?>
													<div class="progress-bar bg-red" role="progressbar" aria-valuenow="<?php echo $bnc['SUM(kejadian)']; ?>" 
													aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $bnc['SUM(kejadian)']; ?>%"></div>
													
													<?php }}}?>
                                                </div>
                                            </td>
                                        </tr>
										<?php }?>
                                    </tbody>
									<tfoot>
                                        <tr>
                                            <th colspan="2">Total Kejadian</th>
											<?php	
												$tahun = $_POST['tahun'];
												$sqlbnc = "SELECT SUM(kejadian) AS jumlah FROM kebencanaan,tahun 
															   WHERE kebencanaan.id_tahun=tahun.id_tahun AND 
															   kebencanaan.id_tahun='$tahun'";
													$querybnc = mysqli_query($koneksidb,$sqlbnc);
													$jml = mysqli_fetch_array($querybnc);
													$total = $jml['jumlah'];
											?>
                                            <th><?php echo $total; ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Pie Chart -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <h2>Jumlah Bencana</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <canvas id="pie_chart" height="325"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Pie Chart -->
            </div>
			<?php }else{}?>
        </div>
    </section>
	<?php include ('includes/script.php'); ?>
	<script>
		$('.tahun').select2({
        placeholder: "Pilih Tahun",
        allowClear: true
		});
	</script>
	<script>
	var ctx = document.getElementById("bar_chart");
	var myLineChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Bungursari", "Cibeureum", "Cihideung", "Cipedes", "Indihiang", "Kawalu", "Mangkubumi", "Purbaratu", "Tamansari", "Tawang"],
			datasets: [{
				label: "Jumlah Kejadian Bencana",
				<?php 
					if(isset($_POST['cari'])){
						$tahun = $_POST['tahun'];
						$sql1 = "SELECT kecamatan, SUM(kejadian) FROM kebencanaan,kecamatan 
								 WHERE kebencanaan.id_kecamatan=kecamatan.id_kecamatan AND 
								 kebencanaan.id_tahun='$tahun' GROUP BY kecamatan.kecamatan";
						}
						$query1 = mysqli_query($koneksidb,$sql1);
				?>
						data: [<?php while($result1 = mysqli_fetch_array($query1)){ echo '"' . $result1['SUM(kejadian)'] . '",';} ?>],
				backgroundColor: ['#00BCD4','#E91E63','#FF5722','#673AB7','#4CAF50','#3F51B5',
								  '#03A9F4','#CDDC39','#F44336','#009688']
								
			}]
		},
		options: {
			responsive: true,
			legend: false,
			scales: {
			  yAxes: [{
				ticks: {
				  min: 0,
				  maxTicksLimit: 11
				},
				gridLines: {
				  display: true
				}
			  }]
			}
		}
	});
	var ctx = document.getElementById("pie_chart");
	var myLineChart = new Chart(ctx, {
		type: 'pie',
		data: {
			datasets: [{
				<?php	
					if(isset($_POST['cari'])){
					$tahun = $_POST['tahun'];
						$sqlbnc = "SELECT bencana, SUM(kejadian) FROM kebencanaan,bencana 
								   WHERE kebencanaan.id_bencana=bencana.id_bencana AND 
								   kebencanaan.id_tahun='$tahun' GROUP BY bencana.bencana";
						}
						$querybnc = mysqli_query($koneksidb,$sqlbnc);
				?>
				data: [<?php while($bnc = mysqli_fetch_array($querybnc)){echo '"' . $bnc['SUM(kejadian)'] . '",';} ?>],
				<?php	
					if(isset($_POST['cari'])){
					$tahun = $_POST['tahun'];
						$sqlbnc = "SELECT bencana, SUM(kejadian) FROM kebencanaan,bencana 
								   WHERE kebencanaan.id_bencana=bencana.id_bencana AND 
								   kebencanaan.id_tahun='$tahun' GROUP BY bencana.bencana";
						}
						$querybnc = mysqli_query($koneksidb,$sqlbnc);
						
				?>
				backgroundColor: [
					<?php while($bnc = mysqli_fetch_array($querybnc)){
						if ($bnc['SUM(kejadian)']<50){
							$status="#4CAF50";
						}else{ 
						if(($bnc['SUM(kejadian)']>50)&&($bnc['SUM(kejadian)']<99)){
							$status="#CDDC39";	
						}else{ if($bnc['SUM(kejadian)']>100){
							$status="#E91E63";	
						}}}
						echo '"' . $status . '",';
						}?>],
			}],
			<?php	
				if(isset($_POST['cari'])){
				$tahun = $_POST['tahun'];
					$sqlbnc = "SELECT bencana, SUM(kejadian) FROM kebencanaan,bencana 
							   WHERE kebencanaan.id_bencana=bencana.id_bencana AND 
							   kebencanaan.id_tahun='$tahun' GROUP BY bencana.bencana";
					}
					$querybnc = mysqli_query($koneksidb,$sqlbnc);
			?>
			labels: [
				<?php while($bnc = mysqli_fetch_array($querybnc)){echo '"' . $bnc['bencana'] . '",';} ?>
			]
		},
		options: {
			responsive: true,
			legend: false
		}
	});
	</script>
</body>
<?php }?>
</html>