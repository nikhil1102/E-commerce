<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Zenopsys  Sign Up</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<?php include('vregister.php'); 
	?>
	
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo"><img src="images/logo1.png"></span></h1>
		</div>
		<div class="login-box " style="
    padding-bottom: 0px; margin-bottom: 50px;">
			<div class="box-header">
			<?php if($_SESSION['type']=="super"):?>
				<h2>Edit Profile</h2>
				<?php elseif($_SESSION['type']=="ret"):?>
								<h2>Edit Profile</h2>

				<?php else:?>
								<h2>Sign Up Sub admins</h2>

				<?php endif;?>
						
			</div>
	<form  method="post" action="updateuser.php" >
	<?php 
	require "conn.php";
	  if(isset($_GET['id']))
	  {
	 $id=$_GET['id'];
	  $query="SELECT * FROM register WHERE email='$id';";
	  $result=mysqli_query($conn,$query);
	  while($row=mysqli_fetch_array($result))
	  {
		  ?>
			<LABEL for="name">Name</LABEL>
			<br/>
			<input type="text" name="name" size="30" value=<?php echo $row['name']?> required>
			<!--<span class="error"><?= $name_error ?></span>-->
			<br>
			<label for="email">Email</label>
			<br/>
			<input type="email" id="email" name="email"  size="30" value=<?php echo $row['email'] ?> readonly required>
			<!-- <span class="error"><?= $email_error ?></span>-->
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" id="password" name="password" size="30" value=<?php echo $row['password']?> required>
			<!--<span class="error"><?= $password_error ?></span>-->
			<br/>
			<label for="phone">Phone Number</label>
			<br/>
			<input type="number" id="phone" name="phone" size="30" value=<?php echo $row['phonenumber']?> readonly required>
			<!--<span class="error"><?= $phone_error ?></span>-->
			<br/>

			<label for="address">Street</label>
			<br/>
		<textarea type="text" id="address" name="street"  cols="33" rows="5" required><?php echo $row['street'];?></textarea>  <br>
			<label for="address">City :</label><input type="text" name="city" size="20" value=<?php echo $row['city'];?> required> <br>
			<label for="address">Country :</label><input type="text" name="country" size="20" value=<?php echo $row['country'];?> required><br>
			<label for="address">Zip :</label><input type="number" name="zip" size="20" value=<?php echo $row['zip'];?> required>   
			<!--<span class="error"><?= $address_error ?></span>-->
				<br><br>
				<input type="hidden" name="id" value=<?php echo $row['type']?>>
			<button type="submit">Update</button>
	  <?php }}?>
		</form>
			
			<br/>
		</form>
</div>
</div>
</body>
</html>