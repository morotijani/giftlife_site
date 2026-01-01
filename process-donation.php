<?php
// Paystack Donation Initiation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $amount = !empty($_POST['custom_amount']) ? $_POST['custom_amount'] : $_POST['amount'];
    
    if (empty($amount) || empty($email)) {
        header("Location: get-involved.php?error=missing_fields");
        exit;
    }

    $amount_in_pesewas = $amount * 100; // Paystack takes amount in lowest currency unit (pesewas/cents)

    $url = "https://api.paystack.co/transaction/initialize";
    $fields = [
        'email' => $email,
        'amount' => $amount_in_pesewas,
        'callback_url' => "http://localhost/giftlife_site/giftlife_site/verify-payment.php",
        'metadata' => [
            'name' => $_POST['name'],
            'donation_type' => 'General Support'
        ]
    ];

    $fields_string = http_build_query($fields);

    // Open connection
    $ch = curl_init();
    
    // Set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer YOUR_SECRET_KEY_HERE", // Replaced by user later
        "Cache-Control: no-cache",
    ));
    
    // So that curl_exec returns the contents of the cURL; rather than echoing it
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

    // Execute post
    $result = curl_exec($ch);
    $response = json_decode($result, true);

    if ($response['status']) {
        // Redirect to Paystack Checkout page
        header("Location: " . $response['data']['authorization_url']);
    } else {
        echo "Paystack API Error: " . $response['message'];
    }
}
?>
