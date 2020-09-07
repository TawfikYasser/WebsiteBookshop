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
$sql = mysqli_query($conn, 'SELECT * FROM borrowing ');
while($row = mysqli_fetch_array($sql)) 
{
    echo "Hello";
    $names[]=$row['Name'];
}
session_start();
$Name=$_SESSION['Name'];
echo $Name."<br>";
@print_r($names);
if (@in_array($Name, $names,true)) 
{ 
    echo "yes";
   @$insert="Delete From borrowing where Name='$Name'";
    @mysqli_query($conn,$insert);
}
else
{
    echo '<script language="javascript">';
    echo 'alert("You not borrowing_any Book")';
    echo '</script>';
}
//header("Location: http://localhost:82/new%20folder/index0.html");  
?>