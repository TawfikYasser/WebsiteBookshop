<!DOCTYPE html>
<html>
    <head>
        <meta charset="Utf-8">
        <link href="index.css" rel="stylesheet">
        <style>
            
        </style>
    </head>
    <body style="background-image: url('Image.JPEG')">
        <div id="sin_In">
            <form id="Sin">
                <div>
                    <h1 id="Header" style="color:yellowgreen">Log in</h1>
                    <label for="Sname">Mail</label><br>
                    <input type="text"id="Mail"name="Mail"placeholder="Type Your Mail"><br>
                    <label for="Pass">Password</label><br>
                    <input type="password"id="Pass"name="Pass"placeholder="Type Your Password"><br>
                    <input name="Send"id="Send"Value="Submit"Type="submit">      
                </div>
            </form>
        </div>
    </body>
</html>
<?php 
    
    if(isset($_GET['Send']))
    {
        $EMail=$Password='';
        if(isset($_GET['Mail']))
        {
            $EMail=$_GET['Mail'];
        }
        if(isset($_GET['Pass']))
        {
            $Password=$_GET['Pass'];
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
        $sql = mysqli_query($conn, 'SELECT * FROM user ');
        while($row = mysqli_fetch_array($sql)) {
           @$names[] = $row['Email'];
           @$Passwords[]=$row['Pass'];
        }
        session_start();
        echo $_SESSION['Mail'];
        echo $_SESSION['Password'];
        echo $Password;
        if ($EMail===$_SESSION['Mail'])
        {
            if($Password===$_SESSION['Password'])
            {
                header("Location: http://localhost:82/new%20folder/index0.html");     
            } 
            else
            {
                echo '<script language="javascript">';
                echo 'alert("Invalid_authen")';
                echo '</script>';
            }
        } 
        else
        {
            //echo "the Fname must be empty";
            echo '<script language="javascript">';
            echo 'alert("this user dosent exist you should sign up first")';
            echo '</script>';
            //header("Location: http://localhost:82/new%20folder/index2.php"); 
        }
    }
?>