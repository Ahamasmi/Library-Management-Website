<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="logo.ico" />
    <title>Add Student</title>
</head>
<body>
<h1>Add Student</h1>
<form method="GET">
Roll number  <input type="text" autocomplete="off" name="Rno"><br><br>
First name  <input type="text" autocomplete="off" name="firstname"><br><br>
Last name  <input type="text" autocomplete="off" name="lastname"><br><br>
Phone number <input type="text" autocomplete="off" name="phonenumber">
<br><br>
<button type="submit">SUBMIT</button>

</form>
<br><br>

<!--<button type="button" onclick="window.location.href ='edit.php'">Back to edit page</button>-->
    <?php
    if(empty($_GET['Rno'])||empty($_GET['firstname'])||empty($_GET['lastname'])||empty($_GET['phonenumber']))
    {
        echo"Fill the details!";
    }
    else
    {
     $Rno=$_GET['Rno'];
     $fname=$_GET['firstname'];
     $lname=$_GET['lastname'];
     $phno=$_GET['phonenumber'];
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
         $sql="INSERT into stud_rec
         (id,firstname,lastname,phonenumber)
         VALUES('$Rno','$fname','$lname','$phno')";
         $retval=mysqli_query($conn,$sql);
         if(! $retval)
         {
             die('Could not add data'.mysqli_error($conn));
         }
         else
         {
             echo"Added ".$Rno." ".$fname." ".$lname." ".$phno;
         }


     }    
    }
    ?>
</body>
</html>