<?php
$connect=mysqli_connect('localhost','root','','hautehabits');
if(!$connect)
{
    die(mysqli_error($connect));
}
?>