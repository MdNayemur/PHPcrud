<?php
 $con=new mysqli("localhost","root","","php1");

function userInsert($fName,$userName,$email,$phone,$status){
   global $con;
    $command="INSERT INTO tbl_student(fName,userName,email,phone,status)VALUES('$fName','$userName','$email','$phone','$status')";
    $result=$con->query($command);
    if ($result) {
        return '<div class="alert alert-success" role="alert">
          Data Successfully Saved</div>';
    }
    else{
        return '<div class="alert alert-danger" role="alert">
          Data not saved'.$con->error.'</div>';
    }
}
function dataShow(){
    global $con;
    $command="SELECT *FROM tbl_student";
    $result=$con->query($command);
    return $result;
}

function dataShowforEdit($id){
    global $con;
    $command="SELECT *FROM tbl_student WHERE id='$id'";
    $result=$con->query($command);
    return $result;
}

function userUpdate($fName,$userName,$email,$phone,$status, $id){
    global $con;
     $command="UPDATE tbl_student SET fName = '$fName',userName= '$userName',email='$email',phone ='$phone',status='$status' WHERE id='$id' ";
     $result=$con->query($command);
     if ($result) {
       header ('location: index.php');
     }
     else{
         return '<div class="alert alert-danger" role="alert">
           Data not saved'.$con->error.'</div>';
     }
 }

 function deleteUser($id){
   global $con;
   $command="DELETE FROM tbl_student WHERE id='$id' ";
   $result=$con->query($command);
   if ($result) {
     header ('location: index.php');
   }
   else{
       return '<div class="alert alert-danger" role="alert">
         Data not saved'.$con->error.'</div>';
   }
 }

 function deleteInactive($id){
	global $con;
	$command="UPDATE tbl_student SET status='2' WHERE id='$id'";
	$result=$con->query($command);
	if ($result) {
		header('location: index.php');
	}
	else{
		return '<div class="alert alert-danger" role="alert">
  		Data not saved'.$con->error.'</div>';
	}
}

function deleteActive($id){
	global $con;
	$command="UPDATE tbl_student SET status='1' WHERE id='$id'";
	$result=$con->query($command);
	if ($result) {
		header('location: index.php');
	}
	else{
		return '<div class="alert alert-danger" role="alert">
  		Data not saved'.$con->error.'</div>';
	}
}