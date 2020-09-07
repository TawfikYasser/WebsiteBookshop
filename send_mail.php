<!DOCTYPE html>
<html>
    <head>
        <link href="index.css" rel="stylesheet">
    </head>
    <body style="background-image: url('Image.JPEG')">
        <div method="POST" id="sin_In">
            <form id="Sin">
                <div>
                    <h1 id="Header" style="color:yellowgreen">Send Mail</h1>
                    <select name='Mails'style="
                        margin-left:580px;
                        margin-top:20px;
                        margin-bottoom:20px;
                        background-color:yellow;
                        width:200px;
                        height:25px;
                        border:2px red solid;
                        border-raduis:5px;                    
                    
                    ">
                        <option> --Sudent_Mail
                        </option>
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
                            $sql = mysqli_query($conn, 'SELECT * FROM user ');
                            while($row = mysqli_fetch_array($sql)) {
                                $names[] = $row['Email'];
                            }
                            foreach($names as $Em)
                            {
                                ?>
                                <option>
                                    <?php echo $Em; ?>
                                </option>   

                            <?php } ?>
                        </select>
                    <br>
                    <textarea id="msg"name="msg"rows="12"cols="50"style="margin-left:470px;background-color:yellowgreen;
                    margin-top:30px">
                    </textarea>
                    <br>
                    <input name="Send"id="Send"Value="Submit"Type="submit">  
                </div>
            </form>
    </body>
</html>
<?php
    if(isset($_GET['Send']))
    {
        $to=$msg='';
        if(isset($_GET['Mails']))
        {
            $to=$_GET['Mails'];
        }
        if(isset($_GET['msg']))
        {
            if(strlen($_GET['msg'])==0)
            {
                
                echo '<script language="javascript">';
                echo 'alert("the message is Empty")';
                echo '</script>';
            }
            else
                $msg=$_GET['msg'];
        }
        $sub="mail from Borrowing_Book Website";
        //$msg="thanking for Registeration in Abdel-rhman mohammed Website";
        //$src="tawfekyassertawfek@gmail.com";
        mail($to,$sub,$msg);
        echo '<script language="javascript">';
        echo 'alert("Mail Successfuly Sending")';
        echo '</script>';
    }
?>
