<?php 

$con = mysqli_connect('localhost', 'root', '', 'cmdc');
mysqli_query($con, 'SET NAMES UTF8');
if (mysqli_connect_errno())
    echo 'can\'t connect to database!';
else
    echo 'connected!!';

?>