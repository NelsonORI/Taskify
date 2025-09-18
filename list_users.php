<?php
// Include the necessary files
require_once 'ClassAutoLoad.php';
require_once 'db_connection.php'; // Your database connection script

// Assuming db_connection.php provides a $pdo object and conf.php is also loaded
global $pdo, $conf;

$layoutsInstance = new layouts();

$layoutsInstance->heading($conf);

// Start the user list section
echo "<div class='container mt-5'>";
echo "<h2 class='text-center'>Registered Users</h2>";

try {
    // Write your SQL query to select email and created_at
    // Do NOT select the password field for security
    $sql = "SELECT email, created_at FROM users ORDER BY created_at ASC";
    $stmt = $pdo->query($sql);

    // Fetch all user rows
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($users) {
        // Display users in a responsive Bootstrap table
        echo "<div class='table-responsive mt-4'>";
        echo "<table class='table table-striped table-hover align-middle'>";
        echo "<thead class='table-dark'>";
        echo "<tr>";
        echo "<th>Email</th>";
        echo "<th>Registered On</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Loop through each user and display them as a table row
        foreach ($users as $user) {
            // Format the date for better readability
            $formatted_date = date("F j, Y, g:i a", strtotime($user['created_at']));
            echo "<tr>";
            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
            echo "<td>" . htmlspecialchars($formatted_date) . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-info mt-4' role='alert'>No users found.</div>";
    }
} catch (PDOException $e) {
    echo "<div class='alert alert-danger mt-4' role='alert'>Database query failed: " . htmlspecialchars($e->getMessage()) . "</div>";
}

echo "</div>";

$layoutsInstance->footer($conf);
?>