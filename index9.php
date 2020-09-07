<!DOCTYPE html>
<html>
    <head>
        <link href="index.css" rel="stylesheet">
    </head>
    <body style="background-image: url('Image.JPEG')">
        <div method="POST" id="sin_In">
            <form id="Sin">
                <div>
                    <h1 id="Header" style="yellowgreen">Borrowing</h1>
                    <label for="Title">Title</label> <br>
                    <input type="text" id="Title"name="Title"placeholder="type book Name"><br>
                    <input type="text" id="Date"name="Date"placeholder="type expected_Date"><br>
                    <input name="Send"id="Send"Value="Submit"Type="submit">  
                </div>
            </form>
    </body>
</html>
<?php 
    if(isset($_GET['Send']))
    {
        $Title=$Date='';
        if(isset($_GET['Title']))
        {
            $F=$_GET['Title'];
            if($F=='')
            {
                //echo "the Name must be empty";
                echo '<script language="javascript">';
                echo 'alert("you must Enter the Name")';
                echo '</script>';
            }
            else
            {
                $Title=$_GET['Title'];
            }
            //$Title=$_GET['Title'];
        }
        if(isset($_GET['Date']))
        {
            session_start();
            $_SESSION['Date']=$_GET['Date'];
            //echo $_GET['Date'];
            if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$F)) {
                $Date=$_GET['Date'];
            } else {
                echo '<script language="javascript">';
                echo 'alert("Wrong_Format")';
                echo '</script>';
            }  
        }
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
        $sql = mysqli_query($conn, 'SELECT * FROM Book ');
        while($row = mysqli_fetch_array($sql)) {
            $names[] = $row['Title'];
        }
        if (in_array($Title, $names,true)) 
        { 
            $Name= $_SESSION['Name'];
            $d=date('y/m/d');
            $insert="insert into borrowing values('$Name','$Title','$d')";
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("invalid Book Name")';
            echo '</script>';
        }
        mysqli_query($conn,$insert);
      }
      //header("Location: http://localhost:82/new%20folder/index0.html");  
?>