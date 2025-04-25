<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h3>Admin User Creation Script</h3>\n";
echo "<pre>\n";

include 'db_config.php';

// Verify database connection
try {
    $pdo->query("SELECT 1");
    echo "[✓] Database connection successful\n";
} catch (PDOException $e) {
    die("[✗] Database connection failed: " . $e->getMessage());
}

// Create users table if it doesn't exist
try {
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        full_name VARCHAR(100) NOT NULL,
        role VARCHAR(20) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
    echo "[✓] Users table created/verified\n";
} catch (PDOException $e) {
    die("[✗] Error creating users table: " . $e->getMessage());
}

$username = 'admin';
$password = 'smapsrms2025';
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

echo "\nCreating admin user with credentials:\n";
echo "Username: $username\n";
echo "Password: $password\n";
echo "Hashed Password: $hashedPassword\n";

try {
    // Delete any existing admin user
    $deleted = $pdo->exec("DELETE FROM users WHERE username = 'admin'");
    echo $deleted ? "[✓] Removed existing admin user\n" : "[i] No existing admin user found\n";
    
    // Insert new admin user
    $stmt = $pdo->prepare("INSERT INTO users (username, password, full_name, role) VALUES (?, ?, ?, ?)");
    $stmt->execute([$username, $hashedPassword, 'System Administrator', 'admin']);
    $userId = $pdo->lastInsertId();
    echo "[✓] Admin user created successfully (ID: $userId)\n";

    // Verify the user was inserted
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user) {
        echo "\n[✓] User verification successful:\n";
        echo str_repeat("-", 40) . "\n";
        echo "ID: " . $user['id'] . "\n";
        echo "Username: " . $user['username'] . "\n";
        echo "Full Name: " . $user['full_name'] . "\n";
        echo "Role: " . $user['role'] . "\n";
        echo "Created: " . $user['created_at'] . "\n";
        echo str_repeat("-", 40) . "\n";
        
        // Verify password can be verified
        if (password_verify($password, $user['password'])) {
            echo "[✓] Password verification successful\n";
        } else {
            echo "[✗] Password verification failed!\n";
        }
    } else {
        die("[✗] User verification failed - no user found");
    }
} catch (PDOException $e) {
    die("[✗] Error creating admin user: " . $e->getMessage() . "\nSQL error: " . print_r($pdo->errorInfo(), true));
}

echo "\nScript completed successfully\n";
echo "</pre>\n";
?>
