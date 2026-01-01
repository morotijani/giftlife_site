<?php 
$pageTitle = "Get Involved";
include('includes/head.php'); 
include('includes/header.php'); 
?>

<!-- Internal Hero -->
<section class="py-5 bg-light-gray">
    <div class="container py-5 text-center">
        <h1 class="display-4 fw-bold">Get Involved</h1>
        <p class="lead">Your time, talent, or treasure can change a life today.</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row g-5">
            <!-- Donation Section -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg p-4 h-100">
                    <div class="card-body">
                        <div class="mb-4">
                            <h3 class="fw-bold mb-3">Make a Donation</h3>
                            <p class="text-secondary">Support our mission to empower women and children. Every Cedi counts.</p>
                        </div>
                        
                        <form action="process-donation.php" method="POST" id="donationForm">
                            <div class="mb-3">
                                <label class="form-label fw-medium">Select Amount (GH₵)</label>
                                <div class="row g-2 mb-3">
                                    <div class="col-4">
                                        <input type="radio" class="btn-check" name="amount" id="amt50" value="50">
                                        <label class="btn btn-outline-primary w-100" for="amt50">50</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="radio" class="btn-check" name="amount" id="amt100" value="100">
                                        <label class="btn btn-outline-primary w-100" for="amt100">100</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="radio" class="btn-check" name="amount" id="amt200" value="200">
                                        <label class="btn btn-outline-primary w-100" for="amt200">200</label>
                                    </div>
                                </div>
                                <input type="number" class="form-control" name="custom_amount" placeholder="Other Amount (GH₵)">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-medium">Full Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-medium">Email Address</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill mt-4">Donate via Paystack</button>
                            <div class="text-center mt-3">
                                <img src="https://paystack.com/assets/payment/cards.png" alt="Payment Methods" class="img-fluid" style="max-height: 25px;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Volunteer Section -->
            <div class="col-lg-6" id="volunteer">
                <div class="card border-0 shadow-sm p-4 h-100 bg-light">
                    <div class="card-body">
                        <div class="mb-4">
                            <h3 class="fw-bold mb-3">Become a Volunteer</h3>
                            <p class="text-secondary">Join our team of passionate individuals dedicated to creating impact.</p>
                        </div>
                        
                        <form action="process-volunteer.php" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-medium">First Name</label>
                                    <input type="text" class="form-control bg-white" name="firstname" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-medium">Last Name</label>
                                    <input type="text" class="form-control bg-white" name="lastname" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-medium">Email Address</label>
                                <input type="email" class="form-control bg-white" name="email" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-medium">Phone Number</label>
                                <input type="tel" class="form-control bg-white" name="phone" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-medium">Area of Interest</label>
                                <select class="form-select bg-white" name="interest">
                                    <option value="healthcare">Healthcare Support</option>
                                    <option value="education">Education/Teaching</option>
                                    <option value="community">Community Development</option>
                                    <option value="admin">Administrative/Social Media</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-medium">Why do you want to join us?</label>
                                <textarea class="form-control bg-white" name="message" rows="3"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-dark btn-lg w-100 rounded-pill mt-4">Submit Application</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>
