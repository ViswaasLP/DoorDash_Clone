<?php include('../config/constants.php')?>
<html>
<head>
<title>Login - Food Court</title>
<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="login">
    <h1 class="text-center">Login</h1><br><br>
    <?php if(isset($_SESSION['login'])){
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    if(isset($_SESSION['no-login-page'])){
        echo $_SESSION['no-login-page'];
        unset($_SESSION['no-login-page']);
    }
    
    ?>
    <br><br>
    <!-- Login Form -->
    <form action="" method="POST" class="text-center">
        <label for="user">Username :</label>
        <input type="text" name="user" id="user" placeholder="Enter Username"><br><br>
        <label for="pass">Password: </label>
        <input type="password" name="pass" id="pass" placeholder="Enter Password"><br><br>
        <input type="submit" name="submit" value="Login" class="btn-primary"><br><br>
    </form>
    <p class="text-center">Created by - <a href="www.viswaasprabu.com">Viswaas Prabu</a></p>
    </div>
</body>
</html>

<?php
// Check if button is pressed
if(isset($_POST['submit'])){
    //Process the form and check login credentials
    //Get the data from login
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);

    //Query to check if the user exists or not
    $sql = "SELECT * FROM tbl_admin WHERE username='$user' AND password='$pass'";

    //Execute the Query
    $res = mysqli_query($conn,$sql);

    //Count rows to check whether user exists or not
    $count = mysqli_num_rows($res);

    if($count==1){
        // User exists and Login success
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user'] = $user;
        //Redirect to homepage/Dashboard
        header('location:'.URL.'admin/');
    }else{
        // User not available
        $_SESSION['login'] = "<div class='error text-center'>Username/Password did not match.</div>";

    }

}
?>