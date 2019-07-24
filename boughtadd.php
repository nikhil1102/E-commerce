<?php
session_start();

require "conn.php";

if(isset($_GET['buy']))
{
		   
	 $id=$_GET['id'];
	$qty=$_GET['qty'];
 $pid="r".$_SESSION['ph'];
 $ppid=$_SESSION['ph'];
 
		if($id=='all')
		{
			$query4="SELECT * FROM "."$pid"." WHERE cart='1' and bought='0';"; 
			$result4=mysqli_query($conn,$query4);
			if(mysqli_num_rows($result4)>0)
			{
				
					$query5="UPDATE "."$pid"." SET cart='0',bought='1' WHERE bought='0';";
				if($result5=mysqli_query($conn,$query5))
			{
				while($row=mysqli_fetch_array($result4))
				{
					$i=$row['pid'];
					$query30="SELECT * FROM product WHERE pnameid='$i';";
			$result30=mysqli_query($conn,$query30);
			while($row11=mysqli_fetch_array($result30))
			{
			//	echo $row11['num'];
			$num=$row11['num'];
			$num=$num+1;
			$q=$row11['qty']-$row['qty'];
			
			
			
			$query31="UPDATE product SET num='$num',qty='$q' WHERE pnameid='$i';";
						if($result31=mysqli_query($conn,$query31))
						{
							
							$query32="SELECT * FROM register WHERE phonenumber='$ppid';";
			$result32=mysqli_query($conn,$query32);
			while($row12=mysqli_fetch_array($result32))
			{
			//	echo "no";
			$num1=$row12['num']+1;
			$em=$row11['email'];
			
			
			$query33="UPDATE register SET num='$num1' WHERE phonenumber='$ppid';";
						if($result33=mysqli_query($conn,$query33))
						{
					$query35="SELECT * FROM register WHERE email='$em';";
			$result35=mysqli_query($conn,$query35);
			while($row13=mysqli_fetch_array($result35))
			{
				
			$num2=$row13['num']+1;
							
							$query34="UPDATE register SET num='$num2' WHERE email='$em';";
							if($result34=mysqli_query($conn,$query34))
						{
							$r_id=$_SESSION['userid'];
							$p_id=$row11['pnameid'];
							$o=$row['qty'];
							$query21="INSERT INTO notification VALUES(NULL,'$r_id','$em','$p_id','1','$o');";
							if($result21=mysqli_query($conn,$query21))
							{
						//echo "no";
							echo '<script language="javascript">';
		
				echo 'window.location.href="bought.php";';
					echo '</script>';
			}
						}
						}
			}
				
			}
			
			}
		}

			}
				}
			}
		}
		else{
 
			$query2="SELECT * FROM "."$pid"." WHERE pid='$id' AND bought='0';"; 
			$result2=mysqli_query($conn,$query2);
			if(mysqli_num_rows($result2)>0)
			{
						$query1="UPDATE "."$pid"." SET cart='0',bought='1' WHERE pid='$id';";
						if($result1=mysqli_query($conn,$query1))
		{
			include "top.php";
		
			}
			
			}
			else
			{
				$query3="INSERT INTO "."$pid"." VALUES(NULL,'$id','$qty','0','1');";
						if($result3=mysqli_query($conn,$query3))
							
		{
			//$query18="SELECT * FROM product WHERE pnameid='$id';" 
			//$result18=mysqli_query($conn,$query18);
			//if(mysqli_num_rows($result18)>0)
			//{
		 include "top.php";
		//}
	  }
	  } 
		}	
}
else if(isset($_GET['cart']))
{
	include "cartadd.php";
}	

	  
?>