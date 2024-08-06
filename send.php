<?php
    include 'config.php';

    $mode = "add";

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];
    $status = $_POST['status'];
    $futureContent = join(",", $_POST['future-content']);
    $feedback = mysqli_real_escape_string($db_connection, $_POST['feedback']);

    $id = mysqli_fetch_assoc(mysqli_query($db_connection, "SELECT ID FROM `respondent_profiles` WHERE ID = (SELECT MAX(ID) FROM respondent_profiles)"));
    $name_from_db = mysqli_fetch_assoc(mysqli_query($db_connection, "SELECT `Channel Name` FROM `respondent_profiles` WHERE `Channel Name` = '$name'"));
    if(isset($id) && isset($name_from_db)) {
        $mode = "edit";
        $id = mysqli_fetch_assoc(mysqli_query($db_connection, "SELECT ID FROM `respondent_profiles` WHERE `Channel Name` = '$name'"))['ID'];
    } else if(isset($id) && !isset($name_from_db)) {
        $id = $id['ID'] + 1; 
    } else if(!isset($id)) {
        $id = 1;
    } 

    if($mode == "add"){
        mysqli_query($db_connection, "INSERT INTO `respondent_profiles` (`ID`, `Channel Name`, `Age`, `Gender`, `Role`) VALUES ('$id', '$name', '$age', '$gender', '$role')");
        mysqli_query($db_connection, "INSERT INTO `respondent_opinions` (`ID`, `Channel Quality`, `Future Content`, `Feedback`) VALUES ('$id', '$status', '$futureContent', '$feedback')");
    } else if($mode == "edit"){
        mysqli_query($db_connection, "UPDATE `respondent_profiles` SET `Channel Name` = '$name', `Age` = '$age', `Gender` = '$gender', `Role` = '$role', `Timestamp` = CURRENT_TIMESTAMP() WHERE `ID` = '$id'");
        mysqli_query($db_connection, "UPDATE `respondent_opinions` SET `Channel Quality` = '$status', `Future Content` = '$futureContent', `Feedback` = '$feedback' WHERE `ID` = '$id'");
    }
    
    // echo '<pre>';
    // print_r($_POST);
    // echo $id;
    // echo $futureContent;
    // echo date('m/d/Y h:i:s a e', time());
    // echo '</pre>';
    header('Location: index.html');
?>