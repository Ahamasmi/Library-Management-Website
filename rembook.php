<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="logo.ico" />
    <title>Remove book</title>
</head>
<body>
<h1>Remove Book</h1>
<form method="GET">
Book code: <input type="text" autocomplete="off" name="id">
<br><br>
<button type="submit">SUBMIT</button></form>
<br><br>
<button onclick="window.location.href='edit.php'">Back to edit page</button>
<?php
if(empty($_GET['id']))
{
    echo"Fill the form<br>";
}
else
{
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
        
        $sql="DELETE from book_rec WHERE id=$id";
        $retval=mysqli_query($conn,$sql);
        if(! $retval ) {
            die('Could not delete data: ' . mysqli_error($conn));
         }
         else
         echo "Deleted data successfully\n";
        
    }
    
}
?>
  
</body>
</html>

