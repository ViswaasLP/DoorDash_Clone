<?php
    //Include constants file
    include("../config/constants.php");

    //Get the id of the admin to be deleted
    $id = $_GET['id'];

    //Create SQL query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the query
    $res = mysqli_query($conn, $sql);
    //Redirect user back to Manage admin page with success/error message.
    if($res==TRUE){
        //Query Loaded and Admin Deleted Successfully
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
        header("location:".URL."/admin/manage-admin.php");
    }else{
        //Query is not executed successfully and Admin not deleted.

        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin</div>";
        header("location:".URL."/admin/manage-admin.php");

    }

?>
