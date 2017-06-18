<?php
include_once( "dbconfig.php" );

$pm_tagname = $_POST["p_tagname"];
$pm_name = $_POST["p_name"];
$pm_surname = $_POST["p_surname"];
$pm_numberadd = $_POST["p_add"];
$pm_district = $_POST["p_addt"];
$pm_prefecture = $_POST["p_adda"];
$pm_province = $_POST["p_addn"];
$pm_postcode = $_POST["p_postn"];
$pm_email = $_POST["p_email"];
$pm_phone = $_POST["p_phone"];
$pm_username = $_POST["p_username"];
$pm_password = $_POST["p_password"];
$pm_like = 0;
$pm_view = 0;


$conn = new mysqli($db_severname, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO profiles(p_tagname,p_name,p_lastname,p_numberadd,p_district,p_prefecture,p_province,p_postcode,p_email,p_phone,p_username,p_password,p_like,p_view)
VALUES ('" . $pm_tagname . "','" . $pm_name . "','" . $pm_surname . "'," . $pm_numberadd . ",'" . $pm_district . "','" . $pm_prefecture . "','" . $pm_province . "','" . $pm_postcode . "','" . $pm_email . "','" . $pm_phone . "','" . $pm_username . "','" . $pm_password . "'," . $pm_like . "," . $pm_view . ")";
    if ($conn->query($sql) === TRUE) {
    header("location:index-success.html");
} else {
    header("location:create-fail.html");
}
    $conn->close();
?>