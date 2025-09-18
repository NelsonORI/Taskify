<?php
require_once 'ClassAutoLoad.php';
require_once 'vendor/autoload.php';
require_once 'conf.php';
require_once 'db_connection.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Database Insertion
    try {
        // Use the existing $pdo connection from db_connection.php
        $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email, $hashed_password]);

        echo "User registered successfully. Proceeding to send confirmation email...<br>";

    } catch (PDOException $e) {
        // Handle database errors (e.g., duplicate email)
        if ($e->getCode() === '23505') {
            die("Error: Email already exists.");
        } else {
            die("Database error: " . $e->getMessage());
        }
    }

    // Email Sending
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'nelson.mecha@strathmore.edu';
        $mail->Password   = 'tptj smnr miua fnqx';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom($conf['site_email'], $conf['site_name']);
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Welcome to ' . $conf['site_name'];
        $mail->Body    = "Hello,<br><br>You have successfully signed up for an account on {$conf['site_name']}. Please check out the admin dashboard to see your account listed.<br><br>Regards,<br>Systems Admin<br>{$conf['site_name']}";
        
        $mail->send();
        echo 'Message has been sent successfully. Please check your email.';

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Form was not submitted.";
}
?>