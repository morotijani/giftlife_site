<?php
require_once 'includes/db.php';
require_once 'includes/config.php';

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
    "Authorization: Bearer " . PAYSTACK_SECRET_KEY,
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

        // Fetch donation details for email
        $stmt = $pdo->prepare("SELECT * FROM donations WHERE reference = ?");
        $stmt->execute([$reference]);
        $donation = $stmt->fetch();

        if ($donation) {
            require_once 'includes/mail-helper.php';

            // Admin Alert
            $adminBody = "
                <div style='font-family: Arial, sans-serif; line-height: 1.6;'>
                    <h2 style='color: #720917;'>New Successful Donation</h2>
                    <p><strong>Donor:</strong> {$donation['name']}</p>
                    <p><strong>Email:</strong> {$donation['email']}</p>
                    <p><strong>Amount:</strong> GH₵ " . number_format($donation['amount'], 2) . "</p>
                    <p><strong>Reference:</strong> {$reference}</p>
                </div>
            ";
            sendEmail(ADMIN_EMAIL, "New Donation: GH₵ " . $donation['amount'], $adminBody);

            // Donor Receipt
            $donorBody = "
                <div style='font-family: Arial, sans-serif; line-height: 1.6;'>
                    <h2 style='color: #720917;'>Official Donation Receipt</h2>
                    <p>Dear {$donation['name']},</p>
                    <p>Thank you for your generous donation of <strong>GH₵ " . number_format($donation['amount'], 2) . "</strong> to the HARUZA FOUNDATION GHANA.</p>
                    <p>Your support helps us continue our mission of providing healthcare and education to those in need. Below are your transaction details:</p>
                    <div style='background: #f8f9fa; padding: 15px; border-radius: 8px;'>
                        <strong>Reference:</strong> {$reference}<br>
                        <strong>Date:</strong> " . date('M d, Y H:i') . "
                    </div>
                    <p>Warm regards,<br>The HARUZA Team</p>
                </div>
            ";
            sendEmail($donation['email'], "Donation Receipt - HARUZA FOUNDATION", $donorBody);
        }
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
