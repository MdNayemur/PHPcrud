<?php include 'includes/header.php'; ?>
<style>

.bt1{
  margin-left:450px ;
}

</style>
<div class="container">
    <div class="row">
    <div class="col-md-8 offset-md-2 mt-4 border">
    <div class="head p-4 d-flex bg-primary mb-2">
            <h3 class="float-left">Edit User</h3>
            <a href="index.php" class="btn btn-warning bt1"><i class="fa fa-eye"></i> User</a>
          </div>
  
                <form method="POST" class="p-3">
                    <h3>Student Information Form</h3>
                    <?php
                    include 'database/connection.php';

                    if(isset($_POST["save"])){
                      $fName=$_POST["fname"];
                      $userName=$_POST["uname"];
                      $email=$_POST["email"];
                      $phone=$_POST["phone"];
                      $status=$_POST["status"];

                      if(empty($fName)){
                        echo '<div class="alert alert-danger" role="alert">Name Field Empty</div>';
                        
                      }
                      elseif(empty($userName)){
                        echo '<div class="alert alert-danger" role="alert">User name is empty</div>';
                        
                      }
                      elseif(empty($email)){
                        echo '<div class="alert alert-danger" role="alert">Email is empty</div>';
                        
                      }
                      elseif(empty($phone)){
                        echo '<div class="alert alert-danger" role="alert">Phone is empty</div>';
                        
                      }
                      elseif($status=="--Select Status--"){
                        echo '<div class="alert alert-danger" role="alert">Status is empty</div>';
                        
                      }
                      else{
                        $id=$_GET['userId'];
                        $msg=userUpdate($fName,$userName,$email,$phone,$status, $id);
                        echo $msg;
                      }

                    }
                      
                   

                  if(isset($_GET['userId'])){
                  $id=$_GET['userId'];
                 $data=dataShowforEdit($id);
                 while($show=$data->fetch_assoc()){ ?>
 


                    <div class="form-group">
                      <label for="fname">Full Name</label>
                      <input type="text" class="form-control" id="fname" aria-describedby="emailHelp" name="fname" placeholder="Enter full name" value="<?php echo $show["fName"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="uname">User Name</label>
                        <input type="text" class="form-control" id="uname" aria-describedby="emailHelp" name="uname" placeholder="Enter User Name" value="<?php echo $show["userName"];?>">
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter Your Email" value="<?php echo $show["email"];?>">
                      </div>
                      <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" aria-describedby="emailHelp" name="phone" placeholder="Enter Your Phone number" value="<?php echo $show["phone"];?>">
                      </div>
                      <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            <option value="<?php echo $show["status"];?>"><?php if($show["status"]==1){echo "active";} else{echo "Inactive";} ?></option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                        
                      </div>
                    
                    <button type="submit" class="btn btn-primary mt-2" name="save">Update</button>
                  </form>
                  <?php }


}
else{
    header('location:index.php');
}?>
               
            </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>