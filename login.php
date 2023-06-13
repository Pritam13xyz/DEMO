<?php
	$conn=mysqli_connect("localhost","root","mysql","jp_data");
	$msg='';
	if (!$conn){
		$msg .="sorry we failded to connect:";
	}
	else{
		$msg .="connection successful";
	}
	if(isset($_POST['email'])){
		if($_POST['edit_sno']==''){
		$sql = 'insert into logins(email,password) values("'.$_POST['email'].'", "'.$_POST['password'].'")';
		}
		execute_query($sql);
	if(mysqli_error($db)){ 
		$msg .= '<p class="text text-danger">Error # 1 : '.mysqli_error($db).'>> '.$sql.'</p>';
	}
	else{
		$msg .= '<p class="text text-success">Data Saved</p>';
	}
}

		
		
				
		#==============================UPDATE=====================#
	/*	else{
		$sql = 'update login set email="'.$_POST['email'].'", password="'.$_POST['password'].'" where email="'.$_POST['edit_sno'].'"';
	}
		mysqli_query($conn,$sql);
		if (mysqli_error($conn)){
		$msg .='sorry we failded to connect: '.mysqli_error($conn).'>>'.$sql;
	}
	else{
		$msg .="data successful";
	}
	}
	#==================================DELETE=======================#
if(isset($_GET['del'])){
	$sql = 'delete from login where email="'.$_GET['del'].'"';
	mysqli_query($conn, $sql);
	if(mysqli_error($conn)){
		$msg .= '<h3 style="color:#ff0000;">Error in deleting . '.mysqli_error($conn).' >> '.$sql.'</h3>';
	}
	else{
		$msg .= '<h3 style="color:#00ff00;">Deleted</h3>';
	}
}	
	#================================EDIT===========================#
if(isset($_GET['edit'])){
	$sql = 'select * from login where email="'.$_GET['edit'].'"';
	$row = mysqli_fetch_assoc(mysqli_query($conn , $sql));
}---*/
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | Life Style Store</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
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
                        <li><a href="signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="content">
            <div class="container-fluid decor_bg" id="login-panel">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h4>LOGIN</h4>
                            </div>
                            <div class="panel-body">
                                <p class="text-warning"><i>Login to make a purchase</i><p>
                                <form role="form" action="login.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="email" class="form-control"  placeholder="Email" name="email"  value="<?php if(isset($row['email'])) {echo $row ['email'];}?>" >
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" required value="<?php if(isset($row['password'])) {echo $row ['password'];}?>" >
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
									<input type="hidden" name="edit_sno" value="<?php if(isset($row['firstname'])) {echo $row ['firstname'];}?>"><br><br>
                                </form><br/>
                            </div>
                            <div class="panel-footer"><p>Don't have an account? <a href="signup.html">Register</a></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <center>
                    <p>Copyright &copy; Lifestyle Store. All Rights Reserved  |  Contact Us: +91 90000 00000</p>	
                </center>
            </div>
        </footer>
		<div class="col-md-11 mx-auto">
	<div class="card">
		<table class="table table-light ">
		<h2 align="center"> Details</h2>
			<tr>
				<td>S no. </td>
				<td>email</td>
				<td>password</td>
				<td>Edit</td>
				<td>Delete</td>
			</tr><?php
				$sql = 'select * from login';
				$result = mysqli_query($conn,$sql);
				$i = 1;
				while($row = mysqli_fetch_assoc($result)){
					echo '<tr>
						<td>'.$i++.'</td>
						<td>'.$row['email'].'</td>
						<td>'.$row['password'].'</td>
						<td><a href="login.php?edit='.$row['email'].'" onClick="return confirm(\'Are you sure?\');">Edit</a></td>
						<td><a href="login.php?del='.$row['email'].'" onClick="return confirm(\'Are you sure? \');" > Delete </a></td>
						</tr>';
					}	
			?>
			
		</table>
	</div>
	</div>
    </body>
</html>