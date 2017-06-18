<?php
include_once( "dbconfig.php" );

$c_name = $_POST["p_name"];
$c_lastname = $_POST["p_lastname"];
$c_email = $_POST["p_email"];
$c_phone = $_POST["p_phone"];
$c_message = $_POST["p_message"];
$p_profileId = $_COOKIE[ "p_id" ];



$conn = new mysqli($db_severname, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO contacts(profile_name,profile_lastname,profile_email,profile_phone,contact_message,profile_id) VALUES ('" . $c_name . "','" . $c_lastname . "','" . $c_email . "','" . $c_phone . "','" . $c_message . "'," . $p_profileId . ")";
        if($conn -> query($sql)===TRUE)
        {
            // echo "success";
            header("location:contact-success.php");
        }
        else
        {   
            // echo "error";
            // header("location:create-fail.html");
            header("location:contact-fail.php");
        }
        $conn -> close();

?>