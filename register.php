<?php
require_once 'db.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    //store password
    $stmt = $pdo->prepare("INSERT INTO users(username, password) VALUES(?, ?)");
    if($stmt->execute([$username, $password])){
        echo "Registration successful. <a href='login.php'>Login here</a>";
    } else{
        echo "Error: Could not register.";
    }
}
?>

<form method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>