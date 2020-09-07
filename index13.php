<!DOCTYPE html>
<html>
    <head>
        <link href="index.css" rel="stylesheet">
    </head>
    <body style="background-image: url('Image.JPEG')">
        <div method="POST" id="sin_In">
            <form id="Sin">
                <div>
                    <h1 id="Header" style="color:yellowgreen">Filter BY</h1>
                    <select name='options'style="
                        margin-left:580px;
                        margin-top:20px;
                        margin-bottoom:20px;
                        background-color:yellow;
                        width:200px;
                        height:25px;
                        border:2px red solid;
                        border-raduis:5px;">
                        <option> --Filter_Options
                        </option>
                        <option value="Aouther">
                            Aouther
                        </option>
                        <option value="Publication_Year">
                            Publication_Year
                        </option>
                        <option value="Parts">
                            Parts
                        </option>
                        </select>
                    <br>
                    <input type="text" name="input"placeholder="Type your input here">
                    <br>
                    <input name="Send"id="Send"Value="Submit"Type="submit">  
                </div>
            </form>
    </body>
</html>
<?php
    if(isset($_GET['Send']))
    {
        $option=$input='';
        if(isset($_GET['options']))
        {
            $option=$_GET['options'];
        }
        if(isset($_GET['input']))
        {
            $input=$_GET['input'];
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
        if($option==='Aouther')
        {
            $sql = mysqli_query($conn, "SELECT * FROM Book where Aouther='$input' ");
            while($row = mysqli_fetch_array($sql)) {
                $names[] = $row['Title'];
            }
            foreach(@$names as $Aou)
            {
                echo '<h3 style="margin-top:5px;color:white ;margin-left:480px;
                font-size:400">'."Book_Aouther:------>". "    ".$Aou.'</h3>'.'<br>';
            }
            mysqli_query.close();

        }
        if($option=='Publication_Year')
        {
            echo $input;
            $sql = mysqli_query($conn, "SELECT * FROM Book where publication_year='$input' ");
            while($row = mysqli_fetch_array($sql)) {
                $names[] = $row['Title'];
            }
            foreach(@$names as $Year)
            {
                echo '<h3 style="margin-top:5px;color:white ;margin-left:480px;
                font-size:400">'."Book_Aouther:------>". "    ".$Year.'</h3>'.'<br>';
            }
        }
        if($option==='Parts')
        {
            $sql = mysqli_query($conn, "SELECT * FROM Book where Parts='$input' ");
            while(@$row = mysqli_fetch_array($sql)) {
                @$names[] = $row['Title'];
            }
            foreach($names as $Par)
            {
                echo '<h3 style="margin-top:5px;color:white ;margin-left:480px;
                font-size:400">'."Book_Aouther:------>". "    ".$Par.'</h3>'.'<br>';
            }
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("Empty Selection Field")';
            echo '</script>';          
        }
    }
?>