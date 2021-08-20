<?php 
require '../config.php';

$cari = $_GET["cari"];

// $query = "SELECT * FROM pegawai where nama like '%$cari%' or jabatan like '%$cari%'";
// $pegawai = query($query);

	$per_hal=10;

	if(isset($_GET['cari'])){
		$cari=mysqli_real_escape_string($conn, $_GET['cari']);
		$jumlah_record=mysqli_query($conn, "SELECT * from pegawai where nama like '%$cari%' or jabatan like '%$cari%'");
		$jum=$jumlah_record->num_rows;
		$halaman=ceil($jum / $per_hal);
		$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		$start = ($page - 1) * $per_hal;
	}else{
		$jumlah_record=mysqli_query($conn, "SELECT * from pegawai");
		$jum=$jumlah_record->num_rows;
		$halaman=ceil($jum / $per_hal);
		$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		$start = ($page - 1) * $per_hal;
	}


?>

<table class="table table-hover" id="myTable">
	<tr>
		<th class="col-md-4" id="nama" onclick="sortTable(0)">Nama</th>
		<th class="col-md-4" id="jabatan" onclick="sortTable(0)">Jabatan</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysqli_real_escape_string($conn, $_GET['cari']);
		$pgw=mysqli_query($conn, "select * from pegawai where nama like '%$cari%' or jabatan like '%$cari%' limit $start, $per_hal");
	}else{
		$pgw=mysqli_query($conn, "select * from pegawai order by $order $sort limit $start, $per_hal");
	}
	$no=$start + 1;
	while($b=mysqli_fetch_array($pgw)){

		?>
		<tr>
			<td><?php echo $b['nama'] ?></td>
			<td><?php echo ($b['jabatan']) ?></td>
		</tr>		
		<?php 
	}
	?>
	</table>


		<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>