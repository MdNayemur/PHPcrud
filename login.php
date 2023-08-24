<?php include 'includes/header.php'?>
<style type="text/css">
	.head{
		overflow: hidden;
	}
	.bd{
		box-shadow: 1px 1px 3px rgba(255, 0, 0, .5);
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
		<div class="head p-4 text-white bg-primary">
				<h3 class="float-left">User List</h3>
				<a href="index.php" class="btn btn-warning float-right"><i class="fa fa-eye"></i> User</a>

				
			</div>
		
				<form method="POST" class="bd p-3">
				<h3>Login</h3>

				<?php
					
					if (isset($_POST['save'])) {
						$userName=$_POST['uname'];
						$password=$_POST['pass'];
						if($userName=="user" && $password=="password"){
							session_start();
							$_SESSION['username']=$userName;
							header('location: index.php');
						}
					}

				?>

				  <div class="form-group">
				    <label for="uname">User Name</label>
				    <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter User Name">
				  </div>

				  <div class="form-group">
				    <label for="pass">Password</label>
				    <input type="password" class="form-control" id="pss" name="pass" placeholder="Enter Password">
				  </div>


				  <button type="submit" class="btn btn-primary" name="save">Login</button>
				</form>
			</div>
	</div>
</div>
<?php include 'includes/footer.php';?>