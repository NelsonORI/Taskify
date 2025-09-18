<?php
// Include the necessary files
require_once 'ClassAutoLoad.php';
require_once 'db_connection.php'; // Your database connection script

$layoutsInstance = new layouts();

$layoutsInstance->heading($conf);

// Start the user list section
echo "<div class='container mt-5'>";
echo "<h2 class='text-center'>Registered Users</h2>";
echo "<ol class='list-group list-group-numbered'>";

try {
    // Write your SQL query to select users in ascending order
    $sql = "SELECT * FROM users";
    $stmt = $pdo->query($sql);

    // Fetch all user rows
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($users) {
        // Loop through each user and display them as a list item
        foreach ($users as $user) {
            echo "<li class='list-group-item'>{$user['email']}</li>";
        }
    } else {
        echo "<li class='list-group-item'>No users found.</li>";
    }
} catch (PDOException $e) {
    echo "<li class='list-group-item text-danger'>Database query failed: " . $e->getMessage() . "</li>";
}

echo "</ol>";
echo "</div>";

$layoutsInstance->footer($conf);
?>