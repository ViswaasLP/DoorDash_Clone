<?php include("partials/menu.php");?>

<div class="main">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>
        <?php
        //Get the id of the selected admin
        $id = $_GET['id'];
        //Create sql query to get the details.
        $sql = "SELECT * FROM tbl_admin";
        //Execute the query.
        $res = mysqli_query($conn, $sql);

        //Check whether the query is executed successfully.
        if($res==TRUE){
            //Check the whether the data exists in db or not.
            $count = mysqli_num_rows($res);
            if($count==1){
                $row = mysqli_fetch_assoc($res);
                $full_name = $row["full_name"];
                $username = $row["username"];

            }else{
                //Redirect to manage admin page without an error.
                header('location:'.URL.'admin/manage-admin.php');
            }
        }else{

        }

        ?>
        <form action="" method="POST">
        <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="name" value=<?php echo $full_name; ?>></td>
                </tr>
                <tr>
                    <td> Username:</td>
                    <td><input type="text" name="user" value=<?php echo $username; ?>></td>
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
    $user = $_POST["user"];
    $name = $_POST["name"];

    //Create SQL query to update admin
    $sql = "UPDATE tbl_admin SET
    full_name = '$name',
    username = '$user'
    WHERE id='$id'
    ";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE){
        $_SESSION['update'] = "<div class='success'>Admin updated successfully</div>";
        header('location:'.URL.'admin/manage-admin.php');

    }else{
        $_SESSION['update'] = "<div class='error'>Failed to update admin</div>";
        header('location:'.URL.'admin/manage-admin.php');


    }

}

?>
    

<?php include("partials/footer.php");?>
