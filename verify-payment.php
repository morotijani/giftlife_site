<?php
require_once 'includes/db.php';

// Paystack Verification
$reference = $_GET['reference'] ?? null;

if (!$reference) {
    die('No reference supplied');
}

$url = "https://api.paystack.co/transaction/verify/" . rawurlencode($reference);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer YOUR_SECRET_KEY_HERE",
    "Cache-Control: no-cache",
]);

$result = curl_exec($ch);
curl_close($ch);

$response = json_decode($result, true);

if ($response['status'] && $response['data']['status'] == 'success') {
    // Update donation status in database
    try {
        $stmt = $pdo->prepare("UPDATE donations SET status = 'success' WHERE reference = ?");
        $stmt->execute([$reference]);
    } catch (PDOException $e) {
        // Log error and continue
    }

    include('includes/head.php');
    include('includes/header.php');
    ?>
    <section class="section-padding text-center">
        <div class="container">
            <div class="mb-4 text-success"><i class="fas fa-check-circle fa-5x"></i></div>
            <h1 class="fw-bold">Thank You!</h1>
            <p class="lead">Your donation was successful. You've just made a difference in someone's life.</p>
            <a href="index" class="btn btn-primary rounded-pill px-5 mt-4">Return Home</a>
        </div>
    </section>
    <?php
    include('includes/footer.php');
} else {
    // Update status to failed
    try {
        $stmt = $pdo->prepare("UPDATE donations SET status = 'failed' WHERE reference = ?");
        $stmt->execute([$reference]);
    } catch (PDOException $e) {}

    include('includes/head.php');
    include('includes/header.php');
    ?>
    <section class="section-padding text-center">
        <div class="container">
            <div class="mb-4 text-danger"><i class="fas fa-times-circle fa-5x"></i></div>
            <h1 class="fw-bold">Payment Problem</h1>
            <p class="lead">We couldn't verify your payment. Please try again or contact support.</p>
            <a href="get-involved" class="btn btn-primary rounded-pill px-5 mt-4">Try Again</a>
        </div>
    </section>
    <?php
    include('includes/footer.php');
}
?>
