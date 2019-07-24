<?php include 'header2.php'; ?>
<center><h1>Cart list</h1></center>
<div class="container-fluid">
  <div class="table table-responsive" >
  

<table class="table table-bordered table-hover">
   
  <thead>
    <tr>
      <th scope="col">S.no </th>
     <th scope="col">Image</th> 
      <th scope="col">Name</th>
      <th scope="col">PID</th>
      <th scope="col">Price</th>
      <th scope="col">discount</th>
     
	  <th scope="col">total price</th>
	   <th scope="col">Qty Ordered</th>
      <th scope="col">category</th>
      <th scope="col">brand</th>
      <th scope="col">description</th>
	  <th scope="col">Edit</th>
	  <th scope="col">Delete</th>



    </tr>
  </thead>
  <tbody>
    <?php 
	 require "conn.php";
	 $tp=0;
	 $i=0;
			$pid="r".$_SESSION['ph'];
			$query2="SELECT * FROM "."$pid"." WHERE cart='1';"; 
			$result2=mysqli_query($conn,$query2);
			if(mysqli_num_rows($result2)>0)
			{
				while($row1=mysqli_fetch_array($result2))
	  {
		  $ik=$row1['pid'];
	  $query="SELECT * FROM product WHERE pnameid='$ik';";
	  $result=mysqli_query($conn,$query);
	  
	  while($row=mysqli_fetch_array($result))
	  {
	 ?>
		  
    <tr>
      <th scope="row"><?php 
	  $i++;
	  echo "$i";
	  ?>
	  
	  </th>
	  <td>
	    
		<div id='img_div'>
      <?php	echo "<img src='images/".$row['image']."' class='img-responsive' height='100' width='100' >";?>
        </div>
		
		</td>
      <td><?php echo $row['pname'];?></td>
      <td><?php echo $row['pnameid'];?></td>
      <td><?php echo $row['pp'];?></td>
      <td><?php echo $row['pd'];?>%</td>
    <td><?php  $l=$row1['qty']*$row['tp'];echo $l; $tp=$tp+$l; ?></td>
	   <td><?php echo $row1['qty'];?></td>
      <td><?php echo $row['category'];?></td>
      <td><?php echo $row['brand'];?></td>
      <td><?php echo $row['description'];?></td>
	  <td>
	    
		<a href="boughtadd.php?id=<?php echo $row['pnameid'];?>&email=<?php echo $row['email'];?>&qty=<?php echo $row1['qty'];?>&buy=<?php echo 'buy';?>" class="btn btn-warning">Buy</a>
	  <td><a onclick="return confirm('Are you sure you want to delete?')" href="cart.php?id=<?php echo $row['pnameid']?>" class="btn btn-danger">Remove</a>
	  </td>
	  <?php 
	  }
	  }
			}
			else{
				echo "not available";
			}
	  ?>
	 </tr>
	 <tr>
      <td colspan="10">Total</td>
      <td colspan="3"><?php echo "Rs $tp";?></td>
	  </tr>
	 <tr>
	 <?php if($i>0):?>
      <td colspan="13" ><a href="boughtadd.php?id=<?php echo 'all' ;?>&buy=<?php echo 'buy';?>" class="btn btn-warning" >Check out</a></td>
	  <?php endif;?>
	  </tr>
	  <?php
	    if(isset($_GET['id']))
	  {
		  $id=$_GET['id'];
		   $query1="DELETE FROM "."$pid"." WHERE pid='$id';";
			if($result1=mysqli_query($conn,$query1))
			{
					echo '<script language="javascript">';
					echo 'window.location.href="cart.php";';
					echo '</script>';
			}
	  }
	  
		  ?>
		</tbody>
  </table>

</div>
</div>
</body>
</html>