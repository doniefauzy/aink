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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<h3 align="center"><span class=""></span>Pegawai</h3>
<br/>
<br/>


<!-- <div class="col-md-12">
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
</div> -->

<!-- <?php

// if data 'search' posted in POST method, make it safe in HTML then store it in $search. If 'search' data was not posted, fill it with an empty string ('')
$search = (isset($_GET['search'])) ? htmlentities($_GET['search']) : '';
$search = (isset($_GET['reset'])) ? '' : $search;

?> -->

  <div class="row">
    <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading"><b>Pencarian</b></div>
        <div class="panel-body">
          <form class="form-inline" >
            <div class="form-group">
              <select class="form-control" id="Kolom" name="Kolom" required="">
                <?php
                  $kolom=(isset($_GET['Kolom']))? $_GET['Kolom'] : "";
                ?>
                <option value="Nama" <?php if ($kolom=="Nama") echo "selected"; ?>>Nama</option>
                <option value="jabatan" <?php if ($kolom=="jabatan") echo "selected";?>>Jabatan</option>
              </select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="cari" name="cari" placeholder="Kata kunci.." required="" value="<?php if (isset($_GET['cari']))  echo $_GET['cari']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
            <a href="index.php" class="btn btn-danger">Reset</a>
          </form>
        </div>
      </div>
    </div>
  </div>


<!-- <form action="" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<input type="text" class="form-control" placeholder="Cari .." aria-describedby="basic-addon1" name="cari" id="cari" value="<?php $search; ?>">
	</div>
</form> -->
<br/>
<div id="container">
<table class="table table-hover" id="myTable">
	<thead>
		<tr>
			<!-- <th class="col-md-4" id="no" onclick="sortTable(0)">No</th> -->
			<th class="col-md-4" id="nama" onclick="sortTable(0)">Nama</th>
			<th class="col-md-4" id="jabatan" onclick="sortTable(1)">Jabatan</th>
		</tr>
	</thead>
	<tbody>
		<?php
	      $page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
	      
	      $kolomCari=(isset($_GET['Kolom']))? $_GET['Kolom'] : "";
	     
	      $kolomcari=(isset($_GET['cari']))? $_GET['cari'] : "";

	      // Jumlah data per halaman
	      $limit = 10;

	      $limitStart = ($page - 1) * $limit;
	      
	      //kondisi jika parameter pencarian kosong
	      if($kolomCari=="" && $kolomcari==""){
	        $SqlQuery = mysqli_query($conn, "SELECT * FROM pegawai LIMIT ".$limitStart.",".$limit);
	      }else{
	        //kondisi jika parameter kolom pencarian diisi
	        $SqlQuery = mysqli_query($conn, "SELECT * FROM pegawai WHERE $kolomCari LIKE '%$kolomcari%' LIMIT ".$limitStart.",".$limit);
	      }
	      
	      // $no = $limitStart + 1;
	      
	      while($row = mysqli_fetch_assoc($SqlQuery)){ 
	      ?>
	        <tr>
	          <!-- <td><?php echo $no++; ?></td> -->
	          <td><?php echo $row['nama']; ?></td>
	          <td><?php echo $row['jabatan']; ?></td>
	        </tr>
	      <?php           
	      }
	      ?>

	</tbody>
	<!-- <?php

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
	?> -->
	</table>
		<div align="center">
	    <ul class="pagination">
	      <?php
	        if($page == 1){ 
	      ?>        
	        <!-- link Previous Page disable --> 
	        <li class="disabled"><a href="#">Previous</a></li>
	      <?php
	        }
	        else{ 
	          $LinkPrev = ($page > 1)? $page - 1 : 1;  

	          if($kolomCari=="" && $kolomcari==""){
	          ?>
	            <li><a href="index.php?page=<?php echo $LinkPrev; ?>">Previous</a></li>
	       <?php     
	          }else{
	        ?> 
	          <li><a href="index.php?Kolom=<?php echo $kolomCari;?>&cari=<?php echo $kolomcari;?>&page=<?php echo $LinkPrev;?>">Previous</a></li>
	         <?php
	           } 
	        }
	      ?>

	      <?php
	        //kondisi jika parameter pencarian kosong
	        if($kolomCari=="" && $kolomcari==""){
	          $SqlQuery = mysqli_query($conn, "SELECT * FROM pegawai");
	        }else{
	          //kondisi jika parameter kolom pencarian diisi
	          $SqlQuery = mysqli_query($conn, "SELECT * FROM pegawai WHERE $kolomCari LIKE '%$kolomcari%'");
	        }     
	      
	        //Hitung semua jumlah data yang berada pada tabel Sisawa
	        $JumlahData = mysqli_num_rows($SqlQuery);
	        
	        // Hitung jumlah halaman yang tersedia
	        $jumlahPage = ceil($JumlahData / $limit); 
	        
	        // Jumlah link number 
	        $jumlahNumber = 1; 

	        // Untuk awal link number
	        $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
	        
	        // Untuk akhir link number
	        $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
	        
	        for($i = $startNumber; $i <= $endNumber; $i++){
	          $linkActive = ($page == $i)? ' class="active"' : '';

	          if($kolomCari=="" && $kolomcari==""){
	      ?>
	          <li<?php echo $linkActive; ?>><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

	      <?php
	        }else{
	          ?>
	          <li<?php echo $linkActive; ?>><a href="index.php?Kolom=<?php echo $kolomCari;?>&cari=<?php echo $kolomcari;?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
	          <?php
	        }
	      }
	      ?>
	      
	      <!-- link Next Page -->
	      <?php       
	       if($page == $jumlahPage){ 
	      ?>
	        <li class="disabled"><a href="#">Next</a></li>
	      <?php
	      }
	      else{
	        $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
	       if($kolomCari=="" && $kolomcari==""){
	          ?>
	            <li><a href="index.php?page=<?php echo $linkNext; ?>">Next</a></li>
	       <?php     
	          }else{
	        ?> 
	           <li><a href="index.php?Kolom=<?php echo $kolomCari;?>&cari=<?php echo $kolomcari;?>&page=<?php echo $linkNext; ?>">Next</a></li>
	      <?php
	        }
	      }
	      ?>
	    </ul>
	  </div>
</div>
		<!-- <ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul> -->
</div>

<script src="js/app.js"></script>
<script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
</body>
</html>