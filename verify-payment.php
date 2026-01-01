<?php
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
    "Authorization: Bearer YOUR_SECRET_KEY_HERE", // Replaced by user later
    "Cache-Control: no-cache",
]);

$result = curl_exec($ch);
curl_close($ch);

$response = json_decode($result, true);

if ($response['status'] && $response['data']['status'] == 'success') {
    // Payment was successful
    include('includes/head.php');
    include('includes/header.php');
    ?>
    <section class="section-padding text-center">
        <div class="container">
            <div class="mb-4 text-success"><i class="fas fa-check-circle fa-5x"></i></div>
            <h1 class="fw-bold">Thank You!</h1>
            <p class="lead">Your donation was successful. You've just made a difference in someone's life.</p>
            <a href="index.php" class="btn btn-primary rounded-pill px-5 mt-4">Return Home</a>
        </div>
    </section>
    <?php
    include('includes/footer.php');
} else {
    // Payment failed or was canceled
    include('includes/head.php');
    include('includes/header.php');
    ?>
    <section class="section-padding text-center">
        <div class="container">
            <div class="mb-4 text-danger"><i class="fas fa-times-circle fa-5x"></i></div>
            <h1 class="fw-bold">Payment Problem</h1>
            <p class="lead">We couldn't verify your payment. Please try again or contact support.</p>
            <a href="get-involved.php" class="btn btn-primary rounded-pill px-5 mt-4">Try Again</a>
        </div>
    </section>
    <?php
    include('includes/footer.php');
}
?>
