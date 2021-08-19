<?php 
session_start();

if( !isset($_SESSION["login"]) ){
	header("Location: login.php");
	exit;
}

require 'config.php';

if (isset($_GET["order"])) {
	$order = $_GET["order"];
}else {
	$order ="nama";
}

if (isset ($_GET["sort"])) {
	$sort = $_GET["sort"];
}else {
	$sort = "ASC";
}

$sort == "DESC" ? $sort = "ASC" : $sort = "DESC";



 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Beranda</title>
	<a href="logout.php">Logout</a>	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery-ui/jquery-ui.js"></script>
</head>
<body>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Pegawai</h3>
<br/>
<br/>


<?php 
$per_hal=10;
$jumlah_record=mysqli_query($conn, "SELECT * from pegawai");
$jum=$jumlah_record->num_rows;
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>		
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
</div>
<form action="" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover" id="myTable">
	<tr>
		<th class="col-md-4" id="nama" onclick="sortTable(0)">Nama</th>
		<th class="col-md-4" id="jabatan" onclick="sortTable(0)">Jabatan</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysqli_real_escape_string($conn, $_GET['cari']);
		$pgw=mysqli_query($conn, "select * from pegawai where nama like '$cari' or jabatan like '$cari'");
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


<script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
<script src="js/app.js"></script>
</body>
</html>