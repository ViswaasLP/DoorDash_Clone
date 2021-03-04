<?php
    if(!isset($_SESSION['user'])){
        $_SESSION['no-login-page'] = "<div class='error text-center'>Please Re-Login</div>";
        header('location:'.URL.'admin/login.php');
    }
?>