<!DOCTYPE html>
<html>
    <head>
        <link href="index.css" rel="stylesheet">
    </head>
    <body style="background-image: url('Image.JPEG')">
        <div method="POST" id="sin_In">
            <form id="Sin">
                <div>
                    <h1 id="Header" style="color:yellowgreen">Sing Up</h1>
                    <label for="Fname">First_Name</label> <br>
                    <input type="text" id="Fname"name="Fname"placeholder="Type your F_Name"><br>
                    <label for="Sname">Second_Name</label><br>
                    <input type="text"id="Lname"name="Lname"placeholder="Type Your Last_Name"><br>
                    <label for="Mail">Mail</label><br>
                    <input type="text"id="Mail"name="Mail"placeholder="Type Your Mail"><br>
                    <label for="Pass">Password</label><br>
                    <input type="password"id="Pass"name="Pass"placeholder="Type Your Password"><br>
                    <label for="Role">
                        Role
                    </label><br>
                    <input type="text" name="Role"placeholder="Type your Role">
                    <br>
                    <input name="Send"id="Send"Value="Submit"Type="submit">  
                </div>
            </form>
        </div>
    </body>
</html>
<?php 
    if(isset($_GET['Send']))
    {
        $FName=$LName=$EMail=$Password=$Role='';
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
            if($_GET['Lname']==='')
            {
                echo "the Fname must be empty";
                echo '<script language="javascript">';
                echo 'alert("you must Enter Your Lname ")';
                echo '</script>';
            }
            else
            {
                $LName=$_GET['Lname'];
            }
        }
        if(isset($_GET['Mail']))
        {
            if (!filter_var($_GET['Mail'], FILTER_VALIDATE_EMAIL)) {
                echo '<script language="javascript">';
                echo 'alert("Invalid email format")';
                echo '</script>';
              }
            else
            {
                $EMail=$_GET['Mail'];
            }
        }
        if(isset($_GET['Pass']))
        {
            if(strlen($_GET['Pass'])<8)
            {
                echo '<script language="javascript">';
                echo 'alert("Password Must be greater than 8 character")';
                echo '</script>';
            }
            else
                $Password=$_GET['Pass'];
        }
        if(isset($_GET['Role']))
        {
            if($_GET['Role']==='Admin' || $_GET['Role']==='admin' || $_GET['Role']==='Student'
            ||$_GET['Role']==='student')
            {
                $Role=$_GET['Role'];
            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("Invalid System Role")';
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
        $sql = mysqli_query($conn, 'SELECT * FROM user ');
        while($row = mysqli_fetch_array($sql)) {
            $names[] = $row['Email'];
        }
        if (in_array($EMail, $names,true)) 
        { 
            echo '<script language="javascript">';
            echo 'alert("this is User is already exit you should log in to enter to the System")';
            echo '</script>';
            sleep(4);
            header("Location: http://localhost:82/new%20folder/index3.php");
        } 
        else
        {
            $insert="insert into user values('$FName','$LName','$EMail','$Password','$Role')";
            session_start();
            $_SESSION['Mail']=$EMail;
            $_SESSION['Password']=$Password;
            $_SESSION['Name']=$FName;
            $_SESSION['Role']=$Role;
            echo "User Role".$Role."<br>";
            mysqli_query($conn,$insert);
            $to_email = 'yousef777906@gmail.com';
            $subject = 'Testing PHP Mail';
            $message = 'This mail is sent using the PHP mail function';
            $sub="mail from Abdelrhamn mohammed";
            $msg="thanking for Registeration in Abdel-rhman mohammed Website";
            $src="yousef777906@gmail.com";
            mail($to_email,$subject,$message);
            header("Location: http://localhost:82/new%20folder/index0.html");  
        }
    }
?>