<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="logo.ico" />
    <title>Add Book</title>
</head>
<body>
<h1>Add Book</h1>
<form method="GET">
Book name: <input type="text" autocomplete="off" name="bookname">
<br><br>
Book code: <input type="text" autocomplete="off" name="id">
<br><br>
Total nos:<input type="text" autocomplete="off" name="total">
<br><br>
<button type="submit">Submit</button>
<!--
    avilable will also be equal to total at the beginning
-->
</form>
<br><br>
<button type="button" onclick="window.location.href ='edit.php'">Back to edit page</button>
<?php
if(empty($_GET['bookname'])||empty($_GET['id'])||empty($_GET['total']))
{
    echo"Fill the details";
}
else{
$bookname=$_GET['bookname'];
$id=$_GET['id'];
$total=$_GET['total'];
$available=$total;
echo $_GET['bookname']."&nbsp".$_GET['id']."&nbsp".$_GET['total']."&nbsp".$_GET['total'];

$id=$_GET['id'];
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
        
        $sql="INSERT INTO book_rec
        (id,bookname,total_nos,available)
        VALUES ('$id','$bookname','$total','$total')";
        $retval=mysqli_query($conn,$sql);
        if(! $retval ) {
            die('Could not add data: ' . mysqli_error($conn));
         }
         else
         echo "Added data successfully\n";
        
    }


}
//now write sql queries to pass these values to the table in the db  (done)


?>
</body>
</html>