<?php
$host='localhost';
$user='root';
$Pass='';
$db='project';
$conn=mysqli_connect($host,$user,$Pass,$db);
if($conn)
{
    echo "connected";
}
else
{
    echo "No";
}
session_start();
$mail=$_SESSION['Mail'];
$delet="delete from user where Email='$mail'";
$_SESSION['Mail']='';
$_SESSION['Password']='';
$_SESSION['Name']='';
$_SESSION['Role']='';
if($delet)
{
    echo $_SESSION['Mail'];
    echo "right deleting";
}
else
{
    
    echo "error in deleting";
}
mysqli_query($conn,$delet);
?>