<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="shortcut icon" href="logo.ico" />
    <title>Lib_Management</title>
     <link rel="stylesheet" type="text/css" href="main.css"/>
    
</head>
<body>
<center><p id="head">Library Management IIITN</p></center>
<button onclick="window.location.href='edit.php'" id="edit">Edit database</button> 
<!--after making login page use it on the buttons above so that unauthorized people cant access the parent directory or the edit page -->
<br><br>
<form method="GET">
RollNo. <input type="text" autocomplete="off" name="RNo"><br>
<br> Book Code <input type="text" autocomplete="off" name="BkCode"><br>
<br> Issue<input type="radio" name="status" value="issued"><br>
<br> Return <input type="radio" name="status" value="returned"><br>
<br><button type="submit" id="sub" >Submit</button>
<button onclick="window.location .href='index.php'" id="res">Reset</button></form>


<?php

$servername="localhost";
$username="id9023615_root";//uname and pass were taken from php myadmin page
$password="pwd54"; 
$dbname="id9023615_test_pr";

//creating connection
$conn=new mysqli($servername,$username,$password,$dbname);
//checking the connection
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}
else
{
    echo"<br>Connection established successfully";
}

if(empty($_GET['BkCode'])||empty($_GET['RNo'])||empty($_GET['status']))
{
    echo"<br><br>Fill the details!!";
}
else
{
$RNo=$_GET['RNo'];//this is prim key use it to search db(table=stud_rec) and edit it
$BCode=$_GET['BkCode'];//this is prim key for table book_rec use it to search that table
$status=$_GET['status'];//use this to add or subtract avilable no of books
if ($status=="issued")
{
    $sql1 = "SELECT available FROM book_rec WHERE $BCode=id ";
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result1);

            if ($row["available"]<=0)
            echo "This book not avialable at the moment!<br/>";


            else {
                    $sql3="SELECT book1,book2 FROM stud_rec WHERE '$RNo'=id ";
                    $result3=mysqli_query($conn,$sql3);
                    $row3=mysqli_fetch_assoc($result3);
                    if($row3["book1"]==0)
                     {
                   
                        $sql4="UPDATE stud_rec SET book1=$BCode WHERE '$RNo'=id";
                        $result4=mysqli_query($conn,$sql4);
                        $sql = "UPDATE book_rec SET available=available-1 WHERE $BCode=id";
                        $result = mysqli_query($conn, $sql);
                        $sql2 = "SELECT available FROM book_rec WHERE $BCode=id ";
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        echo "Successfully issued<br/>";
                        echo "No. of books left: " . $row2["available"];
                     }
                     else if($row3["book2"]==0)
                     {
                   
                        $sql4="UPDATE stud_rec SET book2=$BCode WHERE '$RNo'=id";
                        $result4=mysqli_query($conn,$sql4);
                        $sql = "UPDATE book_rec SET available=available-1 WHERE $BCode=id";
                        $result = mysqli_query($conn, $sql);
                        $sql2 = "SELECT available FROM book_rec WHERE $BCode=id ";
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        echo "Successfully issued<br/>";
                        echo "No. of books left: " . $row2["available"];
                     }
                     else
                     {
                         echo"$RNo has reached their book limit";
                     }               
           }
}

 else if ($status=="returned")
 {
    $sql1 = "SELECT available,total_nos FROM book_rec WHERE $BCode=id ";
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result1);

    if (($row["available"]+1)>$row["total_nos"])
    echo "Books available exceeding total number<br/>";


    else {         
            $sql3="SELECT book1,book2 FROM stud_rec WHERE '$RNo'=id";
            $result3=mysqli_query($conn,$sql3);
            $row3=mysqli_fetch_assoc($result3);
            if($row3["book1"]==$BCode)
            {
                $sql4="UPDATE stud_rec SET book1=0 WHERE '$RNo'=id";
                $result4=mysqli_query($conn,$sql4);
                $sql = "UPDATE book_rec SET available=available+1 WHERE $BCode=id";
                $result = mysqli_query($conn, $sql);
                $sql2 = "SELECT available FROM book_rec WHERE $BCode=id ";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                echo "Successfully returned<br/>";
                echo "No. of books left: " . $row2["available"];
            }
            else if(($row3["book2"]==$BCode))
            {
                $sql4="UPDATE stud_rec SET book2=0 WHERE '$RNo'=id";
                $result4=mysqli_query($conn,$sql4);
                $sql = "UPDATE book_rec SET available=available+1 WHERE $BCode=id";
                $result = mysqli_query($conn, $sql);
                $sql2 = "SELECT available FROM book_rec WHERE $BCode=id ";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                echo "Successfully returned<br/>";
                echo "No. of books left: " . $row2["available"];
            }
            else
            {
                echo"This book is not issued by $RNo";
            }            
   }
}
}
?>
    
</body>
</html>