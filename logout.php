<?php 
    require_once('includes/fetch.php');

    if(isset($_POST['logout'])) {
        unset($_SESSION['admin']);
        session_destroy();
        header('location:login.php');
    }

?>