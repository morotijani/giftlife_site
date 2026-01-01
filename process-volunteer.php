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
