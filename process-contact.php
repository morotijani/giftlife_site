<?php
require_once 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    try {
        $stmt = $pdo->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $subject, $message]);
        
        include('includes/head.php');
        include('includes/header.php');
        ?>
        <section class="section-padding text-center">
            <div class="container">
                <div class="mb-4 text-success"><i class="fas fa-check-circle fa-5x"></i></div>
                <h1 class="fw-bold">Message Sent!</h1>
                <p class="lead">Thank you for reaching out to us. We will get back to you shortly.</p>
                <a href="index" class="btn btn-primary rounded-pill px-5 mt-4">Return Home</a>
            </div>
        </section>
        <?php
        include('includes/footer.php');
    } catch (PDOException $e) {
        die("Error saving message: " . $e->getMessage());
    }
}
?>
