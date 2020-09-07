<!DOCTYPE html>
<html>
    <head>
        <link href="index.css" rel="stylesheet">
    </head>
    <body style="background-image: url('Image.JPEG')">
        <div method="POST" id="sin_In">
            <form id="Sin">
                <div>
                    <h1 id="Header"style="color:yellowgreen">Updating Book Details</h1>
                    <label for="ID">ID</label> <br>
                    <input type="text" id="ID"name="ID"placeholder="Type the Book Id"><br>
                    <label for="Title">Title</label> <br>
                    <input type="text" id="Title"name="Title"placeholder="type book title"><br>
                    <label for="Aouther">Aouther</label><br>
                    <input type="text"id="Aouther"name="Aouther"placeholder="type the book auther"><br>
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
        </div>
    </body>
</html>
<?php
session_start();
if($_SESSION['Role']==='Admin' || $_SESSION['Role']==='admin')
{
  if(isset($_GET['Send']))
  {
      $ID='';
      if(isset($_GET['ID']))
      {
          $ID=$_GET['ID'];
      }
      //echo $ID;
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
          $names[] = $row['ID'];
      }
      if (in_array($ID, $names,true)) 
      { 
        
          echo "this is ID exit please enter the new info";
      }
      else
      {
        echo "the Fname must be empty";
        echo '<script language="javascript">';
        echo 'alert("invalid Book ID")';
        echo '</script>';
    }
    $Title=$Aouther=$copy=$Part=$Id=$Publication='';
    if(isset($_GET['Title']))
    {
        $Title=$_GET['Title'];
    }
    if(isset($_GET['Aouther']))
    {
        $Aouther=$_GET['Aouther'];
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
    $sql = "UPDATE Book SET Title='$Title',Aouther='$Aouther',Copy='$copy',Parts='$Part',publication_year='$Publication' WHERE ID='$ID'";
    mysqli_query($conn,$sql);
    if($sql)
    {
        echo "Succefully updated";
    }
    else
    {
        echo "An Arror were";
    }
}
}
else
{
    echo '<script language="javascript">';
    echo 'alert("this function is not athorized for You")';
    echo '</script>';
     
}
//header("Location: http://localhost:82/new%20folder/index0.html");  
    //print_r($names);     
?>