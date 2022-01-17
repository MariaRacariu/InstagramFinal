<?php
require 'dbh.php'; //require connection script

if(isset($_POST['submit'])){  
  try {
    $dsn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    
    $pass = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
    
    $sql = "SELECT COUNT(username) AS num FROM users WHERE username =      :username";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':username', $user);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row['num'] > 0){
      echo '<script>alert("Username already exists")</script>';
      }else{
        $stmt = $dsn->prepare("INSERT INTO users (username, email, password) 
        VALUES (:username,:email, :password)");
        $stmt->bindParam(':username', $user);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $pass);
    if($stmt->execute()){
      echo '<script>alert("New account created.")</script>';
      //redirect to another page
      echo '<script>window.location.replace("index.php")</script>';
    }else{
      echo '<script>alert("An error occurred")</script>';
    }
  }
}catch(PDOException $e){
    $error = "Error: " . $e->getMessage();
    echo '<script type="text/javascript">alert("'.$error.'");</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form class="zen" action="signup.php" method="post">
  <div class="signup-row">
    <div class="rad-1">
      <input  type="text" required="required" name="username" placeholder="Username">
    </div>  
    <div class="rad-1">
      <input required="required" type="email" name="email" placeholder="Email">
    </div>
    <div class="rad-1">
      <input required="required" type="password" name="password" placeholder="Password">      
    </div>
    <div class="rad-1">
      <button name="submit" type="submit">Registera</button>
    </div>
  </div>
</form>
</body>
</html>
