<?php include 'includes/header.php'; 
session_start();
if (!isset($_SESSION["username"])){
  header('location: login.php');
}

?>
<style>
.bt1{
  margin-left:300px;
}

</style>
<body>
    <div class="container">
        <div class="row">
         
            
            <div class="col-md-10 offset-md-1 p-0 border border-dark">
            <div class="head p-4 d-flex bg-primary mb-2">
            <h3 class="float-left">User List &nbsp; UserName:
            <?php 
            if (isset($_SESSION["username"])) {
            echo $_SESSION["username"];
            }
            ?>

            </h3>
            <a href="addUser.php" class="btn btn-warning bt1"><i class="fa fa-add"></i>Add User</a> &nbsp; <a href="logout.php" class="btn btn-warning ">Logout</a>
          </div>
          <div class="p-2">
          <table id="myTable" class="display table-bordered">
                <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Full Name</th>
                  <th>User Name</th>
                  <th>email</th>
                  <th>phone</th>
                  <th>status</th>
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
              
              <?php
              include 'database/connection.php';

              if (isset($_GET['id'])){
                $data=deleteUser($_GET['id']); 
              }
              if (isset($_GET['dId'])) {
                $data=deleteInactive($_GET['dId']);
              }
              if (isset($_GET['aId'])) {
                $data=deleteActive($_GET['aId']);
              }

              $data=dataShow();
              if($data->num_rows>0){
                  $sl=1;
                while($show=$data->fetch_assoc()){
                  ?>
                  <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $show["fName"]; ?></td>
                    <td><?php echo $show["userName"]; ?></td> 
                    <td><?php echo $show["email"]; ?></td>
                    <td><?php echo $show["phone"]; ?></td>
                    <td><?php
                    if($show["status"]==1){
                      echo '<a class="btn btn-success btn-sm" href="index.php?dId=' .$show["id"].'">Active</a>';
                    }
                    else{
                      echo '<a class="btn btn-warning btn-sm" href="index.php?aId='.$show["id"].'">Inactive</a>';
                    }

                     ?>
                     </td>
                     <td>
                       <a href="editUser.php?userId=<?php echo $show["id"]; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                       <button class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#delete<?php echo $show["id"] ?>"><i class="fa fa-trash-can"></i></button>
                     </td>
                  </tr>

                <?php $sl++; 
                ?>
                <!-- Modal -->
                <div class="modal fade" id="delete<?php echo $show["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                  <div class="modal-content">
                <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this user? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="index.php?id=<?php echo $show["id"]; ?>" type="button" class="btn btn-danger">Confirm</a>
      </div>
    </div>
  </div>
</div>

                <?php }

              }
              else{
                echo "data not found";
              }

              ?>
              </tbody>
              </table>

          </div>
             
            </div>
        </div>
    </div>
   <?php include 'includes/footer.php'; ?>