<?php
/**
 * Global Configuration for HARUZA FOUNDATION GHANA
 * Centralized place for API keys and environment settings.
 */

// ENVIRONMENT SETTINGS
define('ENV', 'test'); // Change to 'live' when ready for production

// PAYSTACK KEYS
if (ENV === 'live') {
    define('PAYSTACK_PUBLIC_KEY', 'pk_live_YOUR_LIVE_KEY_HERE');
    define('PAYSTACK_SECRET_KEY', 'sk_live_YOUR_LIVE_KEY_HERE');
} else {
    define('PAYSTACK_PUBLIC_KEY', 'pk_test_YOUR_TEST_KEY_HERE');
    define('PAYSTACK_SECRET_KEY', 'sk_test_YOUR_TEST_KEY_HERE');
}

// Redirect URL after payment
define('PAYSTACK_CALLBACK_URL', 'http://localhost/giftlife_site/giftlife_site/verify-payment');

?>
