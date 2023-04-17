<?php
require './configuration.php';
$outGoingId=$_SESSION['id'];

    $searchTerm=mysqli_real_escape_string($connect, $_POST['searchTerm']);
    
    $outPut='';

    $sql=mysqli_query($connect, "SELECT * FROM `info` WHERE  NOT id={$outGoingId} AND (`user` LIKE '%{$searchTerm}%' OR email LIKE '%{$searchTerm}%')");

    if (mysqli_num_rows($sql)>0) {
    require 'data.php';
              
    } else {
       $outPut.= "User Not Found";
    }
    echo $outPut;
?>

<!-- 07060862685 -->