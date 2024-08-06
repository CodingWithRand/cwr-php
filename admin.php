<?php
    include 'config.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = mysqli_query($db_connection, "SELECT * FROM `admin_list` WHERE `Name` = '$username' AND `Password` = '$password'");
    
    if(mysqli_num_rows($check) > 0) {
        header('Location: collection_dashboard.php');
    } else {
        echo "<script>
            alert('Wrong username or password!')
            window.location.href = 'login.html';
        </script>";
    }
?>