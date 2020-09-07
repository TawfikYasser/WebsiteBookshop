<!DOCTYPE html>
<html>
    <head>
        <link href="index.css" rel="stylesheet">
</head>
    <body style="background-image: url('Image.JPEG')";>
        <div id="sin_In">
            <form id="Sin">
                <div>
                    <h1 id="Header" style="color:yellowgreen">Update User Info</h1>
                    <label for="Fname">First_Name</label> <br>
                    <input type="text" id="Fname"name="Fname"placeholder="Type your F_Name"><br>
                    <label for="Sname">Second_Name</label><br>
                    <input type="text"id="Lname"name="Lname"placeholder="Type Your Last_Name"><br>
                    <label for="Pass">Password</label><br>
                    <input type="password"id="Pass"name="Pass"placeholder="Type Your Last_Name"><br>
                    <input name="Send"id="Send"Value="Submit"Type="submit">
                </div>
            </form>
        </div>
    </body>
</html>
<?php 
    if(isset($_GET['Send']))
    {
        $host='localhost';
        $user='root';
        $Pass='';
        $db='project';
        $conn=mysqli_connect($host,$user,$Pass,$db);
        $sql = mysqli_query($conn, 'SELECT * FROM user ');
        while($row = mysqli_fetch_array($sql)) {
            $names[] = $row['Email'];
        }
        session_start();
        $EMail=$_SESSION['Mail'];
        echo $EMail;
        if (!in_array($EMail, $names,true)) 
        { 
            echo '<script language="javascript">';
            echo 'alert("this is User dosent exit ,you should Sing_UP in the System")';
            echo '</script>';
            header("Location: http://localhost:82/new%20folder/index2.php");
        } 
        $FName=$LName=$Password='';
        if(isset($_GET['Fname']))
        {
            $F=$_GET['Fname'];
            if($F=='')
            {
                echo "the Fname must be empty";
                echo '<script language="javascript">';
                echo 'alert("you must Enter your Fname")';
                echo '</script>';
            }
            else
            {
                $FName=$_GET['Fname'];
            }
        }
        if(isset($_GET['Lname']))
        {
            $F=$_GET['Lname'];
            if($F=='')
            {
                echo "the Fname must be empty";
                echo '<script language="javascript">';
                echo 'alert("you must Enter your Lname")';
                echo '</script>';
            }
            else
            {
                $LName=$_GET['Lname'];
            }
        }
        if(isset($_GET['Pass']))
        {
            if(strlen($_GET['Pass'])<8)
            {
                echo "the Fname must be empty";
                echo '<script language="javascript">';
                echo 'alert("Password Must be greater than 8 character")';
                echo '</script>';
            }
            else
                $Password=$_GET['Pass'];
        }
        if($conn)
        {
            echo "connected";
        }
        else
        {
            echo "No";
        }
        //
        $Role=$_SESSION['Role'];
        $sql = "UPDATE user SET Fname='$FName',Lname='$LName', Email='$EMail',Pass='$Password',Role='$Role' WHERE Email='$EMail'";
        //$insert="insert into user values('$FName','$LName','$EMail','$Password')";
        //$upd="update user set user.Fname='$FName' where user.Email='$_SESSION['Mail']'";
        //$upd="select * from user";
       
        if($sql)
        {
            echo "updated";
        }
        else
            echo "error";
        echo $EMail;
        mysqli_query($conn,$sql);
        header("Location: http://localhost:82/new%20folder/index0.html");
    }
?>