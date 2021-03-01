<?php include("partials/menu.php");?>

<div class="main">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>
        <?php
        //Get the id of the selected admin
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        
        ?>
        <form action="" method="POST">
        <table class="tbl-30">
                <tr>
                    <td>Current Password:</td>
                    <td><input type="password" name="current" placeholder="Current Password"></td>
                </tr>
                <tr>
                    <td> New Password:</td>
                    <td><input type="password" name="new" placeholder="New Password"></td>
                </tr>
                <tr>
                    <td> Confirm Password:</td>
                    <td><input type="password" name="confirm" placeholder="Confirm Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" value=<?php echo $id; ?> name="id">

                        <input type="submit" value="Add Admin" class="btn-secondary"name="submit">

                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

if(isset($_POST['submit'])){
    //Get all info from the form.
    $id = $_POST["id"];
    $cur_pass = md5($_POST["current"]);
    $new_pass = md5($_POST["new"]);
    $confirm_pass = md5($_POST["confirm"]);


    //Create SQL query to update admin
    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$cur_pass'";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE){
        if($new_pass==$confirm_pass){
            $sql2 = "UPDATE tbl_admin SET 
            password='$cur_pass' WHERE id=$id";

            $res2 = mysqli_query($conn,$sql2);

            if(res2==TRUE){
                $_SESSION['change-pwd'] = "<div class='success'>Password is changed successfully.</div>";
                header('location:'.URL.'admin/manage-admin.php'); 
            }else{
                $_SESSION['change-pwd'] = "<div class='error'>Password has not changed.</div>";
                header('location:'.URL.'admin/manage-admin.php'); 
            }
        }else{
            $_SESSION['change-pwd'] = "<div class='error'>The passwords did not match.</div>";
            header('location:'.URL.'admin/manage-admin.php');
    
        }

    }else{
        $_SESSION['user-not-found'] = "<div class='error'>User not found.</div>";
        header('location:'.URL.'admin/manage-admin.php');


    }

}

?>


<?php include("partials/footer.php");?>
