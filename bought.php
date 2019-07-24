<?php include 'header2.php'; ?>
<center><h1>Ordered list</h1></center>
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
	  <th scope="col">Print</th>
	  <th scope="col">Remove</th>



    </tr>
  </thead>
  <tbody>
    <?php 
	 require "conn.php";
	 $tp=0;
	 $l=0;
	 $i=0;
			$pid="r".$_SESSION['ph'];
			$query2="SELECT * FROM "."$pid"." WHERE bought='1';"; 
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
	
	  
	  <a href="reciept.php?id=<?php echo $_SESSION['userid'];?>&pnameid=<?php echo $row1['pid'];?>&e=<?php echo $row['email'];?>&qty=<?php echo $row1['qty']?>"  class="btn btn-warning" >Print</a></td>
	  <td><a onclick="return confirm('Are you sure you want to delete?')" href="bought.php?id=<?php echo $row['pnameid']?>&sno=<?php echo $row1['sno']?>" class="btn btn-danger">Remove</a>
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
      <td colspan="10">Total</td>
      <td colspan="3"><?php echo "Rs $tp";?></td>
	  <?php
	    if(isset($_GET['id']))
				    if(isset($_GET['sno']))
					{
	  {
		  $id=$_GET['id'];
		  $sno=$_GET['sno'];
		   $query1="DELETE FROM "."$pid"." WHERE pid='$id' AND sno='$sno';";
			if($result1=mysqli_query($conn,$query1))
			{
					echo '<script language="javascript">';
					echo 'window.location.href="bought.php";';
					echo '</script>';
			}
	  }
					}
		  ?>
		</tbody>
  </table>
</div>
</div>
</body>
</html>