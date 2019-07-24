<?php include "header2.php";?>

<div class="container-fluid">
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Products</div>
  <div class="panel-body">
    <!--inner panel contents -->
		 <?php 
	 require "conn.php";
	 if(isset($_GET['id']))
	 {
		 $cat=$_GET['id'];
	  $query1="SELECT * FROM product WHERE category='$cat';";
	  $result1=mysqli_query($conn,$query1);
	  if(mysqli_num_rows($result1)>0)
	  {
	  while($row=mysqli_fetch_array($result1))
	  {
	?>
    <div class="col-md-3">
	<div class="panel panel-default">

  <div class="panel-heading"><h3><?php echo $row['pname'];?></h3></div>
  <div class="panel-body">

   <center><img  class="img-responsive" src="images/<?php echo $row['image'];?>" width="200" height="200"></center>
   
   <br>
   <div class="row">
   
 <center class="text-danger">Price:<?php echo $row['pp']?></center>
 <center>Discount:<?php echo $row['pd']?></center>
<center>Offer Price:<?php echo $row['tp']?><center>
 <center>
 <a href="cartadd.php?id=<?php echo $row['pnameid']?>" class="btn btn-warning">Cart</a>
  <a href="boughtadd.php?id=<?php echo $row['pnameid'];?>&email=<?php echo $row['email'];?>" class="btn btn-warning">Buy</a>
 <a href="viewdetail.php?id=<?php echo $row['pnameid']?>" class="btn btn-warning">View Details</a></center>
  </div>
  </div>
</div>
</div>
	  <?php
	  }
	  }
	  else
	  {
		  echo "No products available under his category";
	  }
	 }
	 
	  ?>
	
	
  </div>

</div>
</div>
</body>
</html>
