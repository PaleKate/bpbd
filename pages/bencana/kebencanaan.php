<?php
include('../includes/config.php');
include('../includes/format_rupiah.php');
include('../includes/library.php');
?>	
<!doctype html>
<html lang="en">

<head>
<!-- ======= Head ======= -->
  <?php include('../includes/head.php');?>
<!-- End Head -->

<body>
<!-- ======= Header ======= -->
  <?php include('../includes/header.php');?>
<!-- End Header -->

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg align-items-center">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-6">
                    <div class="breadcrumb_tittle text-left">
                        <h2>Kebencanaan</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="breadcrumb_content text-right">
                        <p>Home<span>/</span>Bencana<span>/</span>Kebencanaan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- Edukasi Bencana part start-->
    <section class="our_project section_padding" id="portfolio">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12">
				<?php 
					if(isset($_POST['cari'])){
						$id_tahun = $_POST['tahun'];
						$sqlkat = "SELECT kebencanaan.*, kecamatan.*, bencana.*, tahun.* FROM kebencanaan, kecamatan, bencana, tahun WHERE 
								   kebencanaan.id_kecamatan=kecamatan.id_kecamatan AND kebencanaan.id_bencana=bencana.id_bencana AND 
								   kebencanaan.id_tahun=tahun.id_tahun AND tahun.id_tahun='$id_tahun' ORDER BY kecamatan, bencana ASC";
						$querykat = mysqli_query($koneksidb,$sqlkat);
						$tahun = mysqli_fetch_array($querykat);
						
						$sqlthn = "SELECT * FROM tahun WHERE id_tahun='$id_tahun'";
						$querythn = mysqli_query($koneksidb,$sqlthn);
						$thn = mysqli_fetch_array($querythn);
				?>
                    <div class="section_tittle">
                        <h2>Data Kejadian Bencana Berdasarkan</h2>
                        <h2>Jenis Bencana di Kota Tasikmalaya Tahun <?php echo $thn['tahun']; ?></h2>
                    </div>
					<?php }else{ ?>
					<div class="section_tittle">
                        <h2>Data Kejadian Bencana Berdasarkan</h2>
                        <h2>Jenis Bencana di Kota Tasikmalaya Tahun</h2>
                    </div>
					<?php }?>
                </div>
                <div class="col-lg-12">
                    <aside class="single_sidebar_widget search_widget">
						<form method="POST" name="periode" onSubmit="return valid();">
							<div class="col-sm-12">
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
							<div class="col-sm-12">
								 <div class="input-group-append">
									<button style="margin-bottom:10px;" class="genric-btn primary small btn-block" type="submit" name="cari"><i class="ti-search"></i>Search</button>
								 </div>
							</div>
						</form>
					</aside>
                </div>
            </div>
            <div class="filters-content">
			<?php 
				if(isset($_POST['cari'])){
					$tahun = $_POST['tahun'];
						$sqlthn = "SELECT * FROM tahun WHERE id_tahun='$tahun'";
						$querythn = mysqli_query($koneksidb,$sqlthn);
						$thn = mysqli_fetch_array($querythn);
			?>
				<!-- Bar Chart Usage -->
				<div class="row clearfix">
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2 style="margin-left:10px;margin-top:10px;">Statistik Jumlah Kejadian Bencana Tahun <?php echo $thn['tahun']; ?></h2>
							</div>
							<div class="body">
								<canvas id="bar_chart" height="150"></canvas>
							</div>
						</div>
					</div>
				</div>
				<!-- #END# Bar Chart Usage -->
				
				<div class="table-responsive mt-5">
					<h2 style="margin-left:10px;margin-top:10px;" align="center">Jumlah Kejadian Bencana</h2>
					<h2 style="margin-left:10px;margin-top:10px;" align="center">Berdasarkan Jenis Bencana Tahun <?php echo $thn['tahun']; ?></h2>
					<table class="display table table-striped table-bordered table-hover" width="100%" id="example-table" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center" width="12px">No</th>
								<th class="text-center">Kecamatan</th>
								<th class="text-center">Jenis Bencana</th>
								<th class="text-center">Kejadian</th>
								<th class="text-center">Tahun</th>
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
							</tr>
								<?php }?>
						</tbody>
					</table>
				</div>
            </div>
			<?php }else{}?>
        </div>
    </section>
    <!-- edukasi bencana part end-->
    

    <!-- footer part start-->
	<?php include('../includes/footer.php');?>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <?php include('../includes/js.php');?>
    <!-- footer part end-->
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
</body>

</html>