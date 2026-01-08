<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files (Make sure to install PHPMailer via Composer)
require 'vendor/autoload.php';

// Check if the email is stored in the session
if (!isset($_SESSION["email"])) {
    echo "<script>alert('No email found. Please try again.'); window.location.href = 'send_email.php';</script>";
    exit();
} else {
    echo "Email found: " . $_SESSION["email"];  // Check if email is stored
}

// Generate a new OTP
$otp = rand(100000, 999999);  // Generate a 6-digit OTP
$_SESSION["reset_otp"] = $otp; // Store OTP in session for verification

// Get the email from session
$email = $_SESSION["email"];

// Set up PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Use Gmail SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'hersafarenquiry@gmail.com'; // Your Gmail address
    $mail->Password = 'kagy kqij yhva ujri'; // Your Gmail app password (use App Passwords if 2FA is enabled)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('hersafarenquiry@gmail.com', 'Drivons');
    $mail->addAddress($email);  // Recipient's email

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New OTP To Reset Password';
    $mail->Body    = "
        <h3>Dear User,</h3>
        <p>We received another request to reset your password for your account. Please use the following One-Time Password (OTP) to complete the process:</p>
        <h2 style='color: #0f3cb7;'>$otp</h2>
        <p>This OTP is valid for 01 minute. If you did not request a password reset, please ignore this email or contact our support team.</p>
        <p>Best regards,<br>Drivons Team</p>
        <p><strong>Contact Us:</strong><br>If you have any questions, feel free to contact us at <a href='mailto:hersafarenquiry@gmail.com'>support@drivons.com</a>.</p>
    ";

    // Send email
    $mail->send();

    // Set a flag to indicate that OTP was resent successfully
    $_SESSION['otp_resend'] = true;  // Flag to show confirmation message
    header("Location: verify_otp_resend_pass.php");
    exit();

} catch (Exception $e) {
    // Show error if email sending fails
    echo "<script>alert('Failed To Send OTP. Please try again later.');</script>";
    exit();
}
?>
