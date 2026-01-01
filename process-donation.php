<?php
require_once 'includes/db.php';

// Paystack Donation Initiation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $amount = !empty($_POST['custom_amount']) ? $_POST['custom_amount'] : ($_POST['amount'] ?? 0);
    
    if (empty($amount) || empty($email)) {
        header("Location: get-involved?error=missing_fields");
        exit;
    }

    $amount_in_pesewas = $amount * 100;
    $reference = bin2hex(random_bytes(10)); // Generate unique reference

    // Save initial donation record to database
    try {
        $stmt = $pdo->prepare("INSERT INTO donations (name, email, amount, reference, status) VALUES (?, ?, ?, ?, 'pending')");
        $stmt->execute([$name, $email, $amount, $reference]);
    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }

    $url = "https://api.paystack.co/transaction/initialize";
    $fields = [
        'email' => $email,
        'amount' => $amount_in_pesewas,
        'reference' => $reference,
        'callback_url' => "http://localhost/giftlife_site/giftlife_site/verify-payment"
    ];

    $fields_string = http_build_query($fields);

    $ch = curl_init();
    curl_setopt($ch,CURL_URL, $url);
    curl_setopt($ch,CURL_POST, true);
    curl_setopt($ch,CURL_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer YOUR_SECRET_KEY_HERE",
        "Cache-Control: no-cache",
    ));
    curl_setopt($ch,CURL_RETURNTRANSFER, true); 

    $result = curl_exec($ch);
    $response = json_decode($result, true);

    if ($response['status']) {
        header("Location: " . $response['data']['authorization_url']);
    } else {
        echo "Paystack API Error: " . $response['message'];
    }
}
?>
