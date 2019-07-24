<?php include 'header.php'; ?>
<div class="aproduct" style="
    background-color: white;
  max-width: 500px;
  margin: 0 auto;
  position: relative;
  top: 35px;
  padding-bottom: 30px;
  border-radius: 5px;
  box-shadow: 0 5px 50px rgba(0,0,0,0.4);
  text-align: center;
">
<div class="box-header">
        <h2>Update Product</h2>
      </div>
    <form action="update.php" method="post" enctype="multipart/form-data">
		 <?php 
	 require "conn.php";
	   if(isset($_GET['id']))
	  {
	 $id=$_GET['id'];
	  $query="SELECT * FROM product WHERE pnameid='$id';";
	  $result=mysqli_query($conn,$query);
	  while($row=mysqli_fetch_array($result))
	  {
	?>
	<?php
	
		echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' class='img-responsive img-thumbnail' height='300' width='300'  >";
        echo "</div>";
      
	  ?>
    <LABEL for="image"> Select image to upload:</LABEL><br>
    <center ><input type="file" name="image" id="imageToUpload"  style="padding-left: 100px; padding-top: 10px"><br></center>

    <LABEL for="name">Product Name</LABEL><br>
      
      <input type="text" name="pname" required size="40" value=<?php echo $row['pname']?>><br>
	 
      <br>
     <LABEL for="name">Product Id</LABEL><br>
      
      <input type="text" name="pnameid" required size="40" value=<?php echo $row['pnameid']?> readonly><br>
     
      <br> 
      <LABEL for="name">Product price(in Rs)</LABEL><br>
      
      <input type="number" name="pp" id="pp" step="0.001" required size="40" value=<?php echo $row['pp']?>><br>
      
      <br>
	   <br> 
      <LABEL for="name">Product discount(in %)</LABEL><br>
      
      <input type="number" name="pd" id="pd" required size="40" value=<?php echo $row['pd']?>><br>
   
      <br>
	   <br> 
      <LABEL for="name">Total price </LABEL><br>
      
      <input type="number" name="tp" id="tp" step="0.001" readonly size="40" value=<?php echo $row['tp']?> ><br>
	    <LABEL for="name">Available Quantity</LABEL><br>
      
      <input type="number" name="qty" id="pd" value=<?php echo $row['qty']?> required size="40"><br>
	   <br> 
	  <script>
	$(function() {
    $("#pp, #pd").on("keydown keyup", sum);
	function sum() {
	$("#tp").val(Number($("#pp").val())-(Number($("#pp").val()) *(Number($("#pd").val())/100)));

	}
	});
	</script>
	
      <br>
      <LABEL for="name" style="padding-right: 30px">Category</LABEL>
      
      <select name="category" required>
    <option ><?php echo $row['category']?></option>
   <?php 
	 require "conn.php";
	  $query1="SELECT * FROM category;";
	  $result1=mysqli_query($conn,$query1);
	  while($rows=mysqli_fetch_array($result1))
	  {
		  ?>
		  <option value=<?php echo $rows['catname']?>><?php echo $rows['catname']?></option>
	<?php
	  }
	  ?>
  </select>
     
      <br><br>
      <LABEL for="name" style="padding-right: 30px">Brand</LABEL>
      
      <select name="brand" required>
	  <option><?php echo $row['brand']?></option>
	  <?php 
	 require "conn.php";
	  $query2="SELECT * FROM brand;";
	  $result2=mysqli_query($conn,$query2);
	  while($rows=mysqli_fetch_array($result2))
	  {
		  ?>
    <option value=<?php echo $rows['brandname']?>><?php echo $rows['brandname']?></option>
	<?php
	  }
	  
	  ?>
  </select><br>
      
      <br>
      <label for="discription">Discription</label>
      <br/>
      <textarea type="text" id="discription" name="discription"  cols="50" rows="5" required ><?php echo $row['description']?></textarea>   <br>
	<!--  <LABEL for="name">Available : </LABEL><input type="checkbox" name="available"/>-->
        <br><br>
		<?php
		}
	  }
	  ?>
    <button type="submit"  name="submit" id="but" >Update Product</button>
	  
	
</form>
</div>
</body>