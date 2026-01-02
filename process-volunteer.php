<?php
require_once 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $interest = $_POST['interest'];
    $message = $_POST['message'];
    
    try {
        $stmt = $pdo->prepare("INSERT INTO volunteers (first_name, last_name, email, phone, interest, message) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$firstname, $lastname, $email, $phone, $interest, $message]);
        
        // Email Notifications
        require_once 'includes/mail-helper.php';
        
        // Admin Alert
        $adminBody = "
            <div style='font-family: Arial, sans-serif; line-height: 1.6;'>
                <h2 style='color: #720917;'>New Volunteer Application</h2>
                <p><strong>Name:</strong> {$firstname} {$lastname}</p>
                <p><strong>Email:</strong> {$email}</p>
                <p><strong>Phone:</strong> {$phone}</p>
                <p><strong>Interest Area:</strong> {$interest}</p>
                <p><strong>Message:</strong></p>
                <div style='background: #f8f9fa; padding: 15px; border-radius: 8px;'>{$message}</div>
            </div>
        ";
        sendEmail(ADMIN_EMAIL, "New Volunteer Application: {$firstname} {$lastname}", $adminBody);

        // Volunteer Confirmation
        $volunteerBody = "
            <div style='font-family: Arial, sans-serif; line-height: 1.6;'>
                <h2 style='color: #720917;'>Thank You for Joining Us!</h2>
                <p>Hi {$firstname},</p>
                <p>We've received your application to volunteer with our team at <strong>HARUZA FOUNDATION GHANA</strong> in the area of <strong>{$interest}</strong>.</p>
                <p>Our community leads are reviewing your profile and will get back to you shortly to discuss the next steps.</p>
                <p>Thank you for your heart for service!</p>
                <p>Warm regards,<br>The HARUZA Team</p>
            </div>
        ";
        sendEmail($email, "Volunteer Application Received", $volunteerBody);

        include('includes/head.php');
        include('includes/header.php');
        ?>
        <section class="section-padding text-center">
            <div class="container">
                <div class="mb-4 text-success"><i class="fas fa-heart fa-5x"></i></div>
                <h1 class="fw-bold">Application Received!</h1>
                <p class="lead">Thank you, <?php echo htmlspecialchars($firstname); ?>. We appreciate your heart for service. Our team will contact you soon.</p>
                <a href="index" class="btn btn-primary rounded-pill px-5 mt-4">Return Home</a>
            </div>
        </section>
        <?php
        include('includes/footer.php');
    } catch (PDOException $e) {
        die("Error saving application: " . $e->getMessage());
    }
}
?>
