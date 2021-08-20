<?php 
require '../config.php';

$cari = $_GET["cari"];


?>

<table class="table table-hover" id="myTable">
	<thead>
		<tr>
			<th class="col-md-4" id="no" onclick="sortTable(2)">No</th>
			<th class="col-md-4" id="nama" onclick="sortTable(0)">Nama</th>
			<th class="col-md-4" id="jabatan" onclick="sortTable(1)">Jabatan</th>
		</tr>
	</thead>
	<tbody>
		<?php
	      $page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
	      
     
	      $kolomcari=(isset($_GET['cari']))? $_GET['cari'] : "";


	      $limit = 10;

	      $limitStart = ($page - 1) * $limit;
	      
	      $SqlQuery = mysqli_query($conn, "SELECT * FROM pegawai WHERE nama LIKE '%$kolomcari%' OR jabatan LIKE '%$kolomcari%' LIMIT ".$limitStart.",".$limit);
	      
	      $no = $limitStart + 1;
	      
	      while($row = mysqli_fetch_assoc($SqlQuery)){ 
	      ?>
	        <tr>
	          <td><?php echo $no++; ?></td>
	          <td><?php echo $row['nama']; ?></td>
	          <td><?php echo $row['jabatan']; ?></td>
	        </tr>
	      <?php           
	      }
	      ?>

	</tbody>
</table>


<div align="center">
	    <ul class="pagination">
	      <?php
	        if($page == 1){ 
	      ?>        
	        <li class="disabled"><a href="#">Previous</a></li>
	      <?php
	        }
	        else{ 
	          $LinkPrev = ($page > 1)? $page - 1 : 1;  

	          if($kolomcari==""){
	          ?>
	            <li><a href="index.php?page=<?php echo $LinkPrev; ?>">Previous</a></li>
	       <?php     
	          }else{
	        ?> 
	          <li><a href="index.php?cari=<?php echo $kolomcari;?>&page=<?php echo $LinkPrev;?>">Previous</a></li>
	         <?php
	           } 
	        }
	      ?>

	      <?php
	       
	        $SqlQuery = mysqli_query($conn, "SELECT * FROM pegawai WHERE nama LIKE '%$kolomcari%' OR jabatan LIKE '%$kolomcari%' LIMIT ".$limitStart.",".$limit);
	      
	       
	        $JumlahData = mysqli_num_rows($SqlQuery);
	        
	     
	        $jumlahPage = ceil($JumlahData / $limit); 
	        

	        $jumlahNumber = 1; 


	        $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
	        

	        $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
	        
	        for($i = $startNumber; $i <= $endNumber; $i++){
	          $linkActive = ($page == $i)? ' class="active"' : '';

	          if($kolomcari==""){
	      ?>
	          <li<?php echo $linkActive; ?>><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

	      <?php
	        }else{
	          ?>
	          <li<?php echo $linkActive; ?>><a href="index.php?cari=<?php echo $kolomcari;?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
	          <?php
	        }
	      }
	      ?>
	      

	      <?php       
	       if($page == $jumlahPage){ 
	      ?>
	        <li class="disabled"><a href="#">Next</a></li>
	      <?php
	      }
	      else{
	        $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
	       if($kolomcari==""){
	          ?>
	            <li><a href="index.php?page=<?php echo $linkNext; ?>">Next</a></li>
	       <?php     
	          }else{
	        ?> 
	           <li><a href="index.php?cari=<?php echo $kolomcari;?>&page=<?php echo $linkNext; ?>">Next</a></li>
	      <?php
	        }
	      }
	      ?>
	    </ul>
</div>