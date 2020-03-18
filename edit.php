<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="logo.ico" />
    <title>EditDB</title>
    <link rel="stylesheet" type="text/css" href="edit.css"> 
</head>
<body> 

    <p id="h1">Edit the database from here</p>
    <a href="https://databases.000webhost.com/" id="db" >View DB</a><br><br>
    <div>
    <form  method="GET">
    <button type="button" class="add" onclick="window.location.href = 'addstud.php';">
    Add to student record </button><br><br>
    <button type="button" class="rem" onclick="window.location.href = 'remstud.php';">
    Remove from student record</button><br><br>
    <button type="button" class="add" onclick="window.location.href = 'addbook.php';">
    Add to book record</button><br><br>
    <button type="button" class="rem" onclick="window.location.href = 'rembook.php';">
    Remove frombook record</button><br><br><br>
    <button type="button" id="back" onclick="window.location.href = 'index.php';">
    Back</button>
    
    </form>
    </div>
  
</body>
</html>