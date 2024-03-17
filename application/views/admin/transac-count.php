<?php

$servername="localhost";
$uname="root";
$pass="";
$db="car";

$conn=mysqli_connect($servername,$uname,$pass,$db);

if(!$conn){
    die("Connection Failed");
}

$sql = "SELECT SUM( booking_price) FROM booking";
        $amountsum = mysqli_query($conn, $sql) or die(mysqli_error($sql));
        $row_amountsum = mysqli_fetch_assoc($amountsum);
        $totalRows_amountsum = mysqli_num_rows($amountsum);
        echo $row_amountsum['SUM( booking_price)'];
?>