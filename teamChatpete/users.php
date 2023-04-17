<?php
require '../configuration.php';
$outGoingId=$_SESSION['id'];

$sql=mysqli_query($connect, "SELECT * FROM `info` WHERE NOT id={$outGoingId}");
$outPut="";

if (mysqli_num_rows($sql) <=0) {
    $outPut .='You have no friends to Chat With';
    
}elseif (mysqli_num_rows($sql)>0) {
    require '../data.php';
    }

    echo $outPut;

?>