<?php 
include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Signup | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="index.html">Lifestyle Store</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid decor_bg" id="content">
            <div class="row">
                <div class="container">
                    <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                        <h2>SIGN UP</h2>
                        <form  action="registration.php" method="POST" enctype = "multipart/form-data">
                            <div class="form-group">
                                <input class="form-control" id="name" placeholder="Name" name="name"  required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"  placeholder="Email"  name="e-mail" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control"  placeholder="Contact" maxlength="10" size="10" name="contact" required>
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control"  placeholder="City" name="city" required>
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control"  placeholder="Address" name="address" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<!--printing Data-->
		<table border="1" style="width:100%">
			<thead>
				<td>Name</td>
				<td>email</td>
				<td>pass</td>
				<td>contact</td>
				<td>city</td>
				<td>Address</td>
				<td>Edit</td>
				<td>Delete</td>
			</thead>
			<?php 
			$sql = "select * from registration";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){
			?>
			<tr>
				<td><?php echo $row['name'] ?> </td>
				<td><?php echo $row['email'] ?> </td>
				<td><?php echo $row['pass'] ?> </td>
				<td><?php echo $row['contact'] ?> </td>
				<td><?php echo $row['city'] ?> </td>
				<td><?php echo $row['address'] ?> </td>
				<td><a href= "registration.php?edit=".<?php echo $row['Id'] ?>>Edit:<?php echo $row['Id'] ?></a></td>
				<td><a href= "registration.php?del=".<?php echo $row['Id'] ?>>Delete:<?php echo $row['Id'] ?></a></td>
			</tr>
			<?php 
				}
			}
		?>
		</table>
		<br><br><br>
        <footer>
            <div class="container">
                <center>
                    <p>Copyright &copy; Lifestyle Store. All Rights Reserved  |  Contact Us: +91 90000 00000</p>	
                </center>
            </div>
        </footer>
    </body>
</html>