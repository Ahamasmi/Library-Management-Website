<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="logo.ico" />
    <title>Remove Student</title>
</head>
<body>
<h1>Remove sudent</h1>
<form method="GET">

Roll No: <input type="text" autocomplete="off" name="Rno">
<br><br>
<button type ="submit">SUBMIT</button>
</form>
<br><br>
<button type="button" onclick="window.location.href ='edit.php'">Back to Edit page</button>
<?php
if(empty($_GET['Rno']))
{
    echo"Fill the form";

}
else
{
    $Rno=$_GET['Rno'];
    $servername="localhost";
$username="id9023615_root";//uname and pass were taken from php myadmin page
$password="pwd54"; 
$dbname="id9023615_test_pr";
    $conn=new mysqli($servername,$username,$password,$dbname);
    if(! $conn)
    {
        die('could not connect'.mysql_error());
    }
    else
    {
        $sql="DELETE FROM stud_rec WHERE id='$Rno'";
        $retval=mysqli_query($conn,$sql);
        if(! $retval)
        {
            die ("ERROR".mysqli_error($conn));
        }
        else
        {
            echo " $Rno removed successfully";
        }
    }
    //write sql query here (done)
}

?>
    
</body>
</html>