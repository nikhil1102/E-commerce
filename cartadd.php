<?php
session_start();

require "conn.php";

	 $id=$_GET['id'];
	 	$qty=$_GET['qty'];
 $pid="r".$_SESSION['ph'];
			$query2="SELECT * FROM "."$pid"." WHERE pid='$id' AND cart='1';"; 
			$result2=mysqli_query($conn,$query2);
			if(mysqli_num_rows($result2)>0)
			{
				//$query1="UPDATE "."$pid"." SET cart='1' WHERE pid='$id';";
					//	if($result1=mysqli_query($conn,$query1)){
				echo '<script language="javascript">';
			echo 'alert("already added in cart");';
					echo 'window.location.href="ret.php";';
					echo '</script>';
			//}
			}
			else{
			$query="INSERT INTO "."$pid"." VALUES(NULL,'$id','$qty','1','0');";
			if($result=mysqli_query($conn,$query))
{
	echo '<script language="javascript">';
			echo 'alert("added to cart");'; 
			echo 'window.location.href="ret.php";';			//not showing an alert box.
			echo '</script>';
}
else
{
	echo '<script language="javascript">';
			echo 'alert("not added to cart");'; 
			echo 'window.location.href="ret.php";';	//not showing an alert box.
			echo '</script>';
}
	  }
 
	  
?>