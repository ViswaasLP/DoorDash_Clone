<?php
    include('../config/constants.php');
    // Destroy the session (Also destroys $_SESSION['user'])
    session_destroy(); 
    //Redirect to Login Page
    header('location:'.URL.'admin/login.php');
    


?>