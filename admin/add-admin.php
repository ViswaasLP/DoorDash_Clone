<?php include("partials/menu.php");?>
<div class="main">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>
        <?php 
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="name" placeholder="Enter Name here"></td>
                </tr>
                <tr>
                    <td> Username:</td>
                    <td><input type="text" name="user" placeholder="Enter username here"></td>
                </tr>
                <tr>
                    <td> Password:</td>
                    <td><input type="password" name="pass" placeholder="Enter Password here"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Add Admin" class="btn-secondary"name="submit">

                    </td>
                </tr>
            </table>
        </form>
    </div>

</div>
<?php include("partials/footer.php");?>

<?php 
// Process the value from the form and save in database
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $user = $_POST['user'];
        $pass = md5($_POST['pass']); //Password encryption with MD5

        $sql = "INSERT INTO tbl_admin SET
            full_name='$name',
            username='$user',
            password='$pass'
        ";


        $res = mysqli_query($conn, $sql) or die(sql_error());
        if($res==TRUE){
            //Data is successfully inserted
            //Creating session variable to display message.
            $_SESSION['add'] = "<div class='success'>Admin added successfully.</div>";
            //Redirect user to page
            header("location:".URL.'admin/manage-admin.php');
        }else{
            $_SESSION['add'] = "<div class='error'>Failed to add admin.</div>";
            //Redirect user to page
            header("location:".URL.'admin/add-admin.php');
        }
}




?>
