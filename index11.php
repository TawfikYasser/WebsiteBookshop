<!DOCTYPE html>
<html>
    <head>
        <link href="index.css" rel="stylesheet">
    </head>
    <body style="background-image: url('Image.JPEG')">
        <div method="POST" id="sin_In">
            <form id="Sin">
                <div>
                    <h1 id="Header" style="color:yellowgreen">extending Date</h1>
                    <label for="Date">Title</label> <br>
                    <input type="text" id="Date"name="Date"placeholder="type the New_Date"><br>
                    <input name="Send"id="Send"Value="Submit"Type="submit">  
                </div>
            </form>
    </body>
</html>
<?php
    if(isset($_GET['Send']))
    { 
        $Date='';
        if(isset($_GET['Date']))
        {
            if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$_GET['Date'])) {
                $Date=$_GET['Date'];
            } else {
                echo '<script language="javascript">';
                echo 'alert("Wrong_Format")';
                echo '</script>';
            }  
        }
    }
    $host='localhost';
    $user='root';
    $Pass='';
    $db='project';
    $conn=mysqli_connect($host,$user,$Pass,$db);
    $sql = mysqli_query($conn, 'SELECT * FROM borrowing ');
    while($row = mysqli_fetch_array($sql)) 
    {
        $names[]=$row['Name'];
    }
    session_start();
    $Name=$_SESSION['Name'];
    echo $Name."<br>";
    @print_r($names);
    if (@in_array($Name, $names,true)) 
    { 
        @$insert="update borrowing set Ex_Date='$Date' where Name='$Name'";
        @mysqli_query($conn,$insert);
    }
    else
    {
        echo '<script language="javascript">';
        echo 'alert("You not borrowing_any Book")';
        echo '</script>';
    }
?>