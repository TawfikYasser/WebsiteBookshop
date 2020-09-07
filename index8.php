<!DOCTYPE html>
<html>
    <head>
        <link href="index.css" rel="stylesheet">
    </head>
    <body style="background-image: url('Image.JPEG')">
        <div method="POST" id="sin_In">
            <form id="Sin">
                <div>
                    <h1 id="Header" style="color:yellowgreen">Browsing</h1>
                    <label for="ID">Book ID</label> <br>
                    <input type="text" id="ID"name="ID"placeholder="Type the Book Id"><br>
                    <input name="Send"id="Send"Value="Submit"Type="submit">  
                </div>
            </form>
        </div>
    </body>
</html>
<?php
    if(isset($_GET['Send']))
    {
        $ID='';
        if(isset($_GET['ID']))
        {
            $ID=$_GET['ID'];
        }
        $host='localhost';
        $user='root';
        $Pass='';
        $db='project';
        $conn=mysqli_connect($host,$user,$Pass,$db);
        if($conn)
        {
            //echo "connected";
        }
        else
        {
            //echo "No";
        }
        $sql = mysqli_query($conn, 'SELECT * FROM Book ');
        while($row = mysqli_fetch_array($sql)) {
            $names[] = $row['ID'];
        }
        if (in_array($ID, $names,true)) 
        { 
            //echo "this is ID exit please enter the new info";
            $sql1="select * from book where ID='$ID'";
            $sqle_ex=mysqli_query($conn,$sql1);
            $Aou='';
            while($row1 = mysqli_fetch_array($sqle_ex)) {
                    $Aou= $row1['Aouther'];
                    $Tit= $row1['Title'];
                    $co= $row1['Copy'];
                    $Pa=$row1['Parts'];
                    $Pub=$row1['publication_year'];
            }   
            echo '<h3 style="margin-top:5px;color:white ;margin-left:480px;f
            font-size:400">'."Book_Aouther:------>". "    ".$Aou.'</h3>'.'<br>';
            echo '<h3 style="margin-top:10px;color:white ;margin-left:480px;f
            font-size:400">'."Book_Title:------>". "    ".$Tit.'</h3>'.'<br>';
            echo '<h3 style="margin-top:10px;color:white ;margin-left:480px;f
            font-size:400">'."Book_Copy_Number:------>". "    ".$co.'</h3>'.'<br>';
            echo '<h3 style="margin-top:10px;color:white ;margin-left:480px;f
            font-size:400">'."Book_Parts:------>". "    ".$Pa.'</h3>'.'<br>';
            echo '<h3 style="margin-top:10px;color:white ;margin-left:480px;f
            font-size:400">'."Book_Publication_year:------>". "    ".$Pub.'</h3>'.'<br>';
            }
        else
        {
            //echo "the Fname must be empty";
            echo '<script language="javascript">';
            echo 'alert("invalid Book ID")';
            echo '</script>';
            //echo "";
        }
    }
    //header("Location: http://localhost:82/new%20folder/index0.html");  
?>