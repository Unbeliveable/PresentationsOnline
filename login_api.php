<?php
include_once( "dbconfig.php" );

$pm_username=$_POST["p_username"];
$pm_password=$_POST["p_password"];

// $pm_username="Samapon";
// $pm_password="1234";

$conn = new mysqli($db_severname, $db_username, $db_password, $db_name);

// mysql_connect("localhost","root","root");
// mysql_select_db("mydatabase");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM profiles WHERE p_username = '".($pm_username)."' and p_password = '".($pm_password)."'";
$result = $conn->query($sql);




    if ($result->num_rows > 0) { // $result ค่าที่เก็บการ query ถ้ากรอกข้อมูลแล้วเจอข้อมูลใน databast แล้ว num_rows จะมากกว่า 0

        while($row = $result->fetch_assoc()) {

            // print_r( $row );

            setcookie("p_name", $row["p_name"]);
            setcookie("p_lastname", $row["p_lastname"]);
            setcookie("p_email", $row["p_email"]);
            setcookie("p_phone", $row["p_phone"]);
            setcookie("p_id", $row["p_id"]);
            setcookie("p_like", $row["p_like"]);
            setcookie("p_view", $row["p_view"]);
            setcookie("p_tagname", $row["p_tagname"]);

            // echo $_COOKIE[ "pm_name" ];





            // setcookie("pm_name", $row["pm_surname"], time() + 3600, '/'); 
            //เอาตัวแปร stu_name  มาเก็บ  $row["stu_email"] เพื่อเช็ตค่า เข้า cookie
            //  session_start();
            // $_SESSION["pm_name"] = $row["pm_surname"]; 
            // echo print_r($_COOKIE);  
            header("location:home.php"); //เรียกหน้า index.php
        }
    } else {
        header("location:index-fail.html");
            // header("Location:login-fail.html");
        // header("Location:loginfail.php"); // ถ้ากรอบข้อมูลแล้วไม่เจอข้อมูลใน databast จะเข้าไฟล์ loginfail.php
    }
    $conn->close();
    
?>