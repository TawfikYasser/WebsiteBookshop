<!DOCTYPE html>
<html>
    <head>
        <link href="index.css" rel="stylesheet">
    </head>
    <body style="background-image: url('Image.JPEG')">
        <div method="POST" id="sin_In">
            <form id="Sin">
                <div>
                    <h1 id="Header" style="color:yellowgreen">Add Book</h1>
                    <label for="Title">Title</label> <br>
                    <input type="text" id="Title"name="Title"placeholder="type book title"><br>
                    <label for="Aouther">Aouther</label><br>
                    <input type="text"id="Aouther"name="Aouther"placeholder="type the book auther"><br>
                    <label for="ID">Book_ID</label><br>
                    <input type="text"id="ID"name="ID"placeholder="Type the Book_ID"><br>
                    <label for="Copy">Number_of_Copy</label><br>
                    <input type="text"id="Copy"name="Copy"placeholder="Type the number of Copies"><br>
                    <label for="Year_publication">Year_publication</label><br>
                    <input type="text"id="Year"name="Year"placeholder="Type the Year_publication">
                    <br>
                    <label for="Part">
                        Number of Parts
                    </label>
                    <input type="text"id="Part"name="Part"placeholder="Type the number of Parts">
                    <input name="Send"id="Send"Value="Submit"Type="submit">  
                </div>
            </form>
        
    </body>
</html>
<?php

session_start();
echo $_SESSION['Role'];
if($_SESSION['Role']==='Admin' || $_SESSION['Role']==='admin')
{
    if(isset($_GET['Send']))
    {
        $Title=$Aouther=$copy=$Part=$Id=$Publication='';
        if(isset($_GET['Title']))
        {
            $F=$_GET['Title'];
            if($F=='')
            {
                echo "the Name must be empty";
                echo '<script language="javascript">';
                echo 'alert("you must Enter your Fname")';
                echo '</script>';
            }
            else
            {
                $Title=$_GET['Title'];
            }
            //$Title=$_GET['Title'];
        }
        if(isset($_GET['Aouther']))
        {
            $F=$_GET['Aouther'];
            if($F=='')
            {
                echo "the Name must be empty";
                echo '<script language="javascript">';
                echo 'alert("you must Enter your Fname")';
                echo '</script>';
            }
            else
            {
                $Aouther=$_GET['Aouther'];
            }
            //$Aouther=$_GET['Aouther'];
        }
        if(isset($_GET['ID']))
        {
            $F=$_GET['ID'];
            if($F=='')
            {
                echo "the Name must be empty";
                echo '<script language="javascript">';
                echo 'alert("you must Enter your Fname")';
                echo '</script>';
            }
            else
            {
                $Id=$_GET['ID'];
            }
        }
        if(isset($_GET['Copy']))
        {
            $copy=$_GET['Copy'];
        }
        if(isset($_GET['Year']))
        {
            $Publication=$_GET['Year'];
        }
        if(isset($_GET['Part']))
        {
            $Part=$_GET['Part'];
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
        $insert="insert into Book values('$Title','$Aouther','$copy','$Id','$Part','$Publication')";
        mysqli_query($conn,$insert);
        header("Location: http://localhost:82/new%20folder/index0.html");
    }
}
else
{
    echo '<script language="javascript">';
    echo 'alert("this function is not athorized for You")';
    echo '</script>';   
}   
?>