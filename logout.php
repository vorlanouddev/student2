<?php
    include 'mysql.php';
    session_start();
    session_unset('userid');
    session_unset('gender');
    session_unset('fname');
    session_unset('lname');
    header('location:login.php');
?>
