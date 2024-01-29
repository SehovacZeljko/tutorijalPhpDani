<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<h3>Change Account</h3>

    <form action="includes/UserUpdate.inc.php" method="post">
       
        <input type="text" name="user_name" placeholder="User name...">
        <br>
     
        <input type="password" name="pwd" placeholder="Password...">
        <br>
      
        <input type="text" name="email" placeholder="Email...">
     
        <br>
        <button>Update</button>
    </form>


    <h3>Delete Account</h3>

<form action="includes/UserDelete.inc.php" method="post">
   
    <input type="text" name="user_name" placeholder="User name...">
    <br>
 
    <input type="password" name="pwd" placeholder="Password...">
    <br>
  
  
 
    <br>
    <button>Delete</button>
</form>







</body>

</html>