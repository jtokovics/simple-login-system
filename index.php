<?php
require_once 'db.php'; // this connects to your DB

// Simple check if form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    // prepare SQL to avoid SQL injection
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();

    if ($user) {
        echo "Login successful! Welcome, " . htmlspecialchars($user['username']) . " 🎉";
        // redirect or start session, etc.
    } else {
        echo "Invalid username or password  ❌";
    }
}
?>

<!-- HTML login form -->
<form method="POST" action="">
    <label>Username: <input type="text" name="username" required></label><br>
    <label>Password: <input type="password" name="password" required></label><br>
    <button type="submit">Login</button>
</form>
