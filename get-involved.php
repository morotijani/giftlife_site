<?php 
$pageTitle = "Get Involved & Save Lives";
include('includes/head.php'); 
include('includes/header.php'); 
?>

<!-- Modern Header -->
<section class="py-5 bg-primary text-white text-center position-relative overflow-hidden">
    <div class="container py-5 position-relative" style="z-index: 2;" data-aos="fade-up">
        <h1 class="display-3 fw-bold mb-3">Get <span class="text-dark">Involved</span></h1>
        <p class="lead opacity-75 mx-auto" style="max-width: 600px;">Whether through donations or volunteering, your contribution creates ripples of hope.</p>
    </div>
</section>

<section class="section-padding bg-light">
    <div class="container">
        <div class="row g-5 justify-content-center">
            <!-- Donation Card -->
            <div class="col-lg-5" data-aos="fade-right">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100">
                    <div class="bg-dark p-5 text-white text-center">
                        <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center mx-auto mb-4" style="width: 70px; height: 70px;">
                            <i class="fas fa-heart fs-3"></i>
                        </div>
                        <h3 class="fw-bold mb-0">Make a Donation</h3>
                    </div>
                    <div class="card-body p-5">
                        <p class="text-muted text-center mb-5">Your financial support provides immediate relief and long-term resources.</p>
                        
                        <form action="process-donation" method="POST">
                            <div class="mb-4">
                                <label class="form-label fw-bold small text-uppercase">Select Amount (GH₵)</label>
                                <div class="row g-2">
                                    <div class="col-4">
                                        <input type="radio" class="btn-check" name="amount" id="amt50" value="50">
                                        <label class="btn btn-outline-primary w-100 rounded-pill py-2" for="amt50">50</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="radio" class="btn-check" name="amount" id="amt100" value="100">
                                        <label class="btn btn-outline-primary w-100 rounded-pill py-2" for="amt100">100</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="radio" class="btn-check" name="amount" id="amt200" value="200">
                                        <label class="btn btn-outline-primary w-100 rounded-pill py-2" for="amt200">200</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label fw-bold small text-uppercase">Or Custom Amount</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0 rounded-start-pill ps-4">GH₵</span>
                                    <input type="number" name="custom_amount" class="form-control border-start-0 rounded-end-pill py-3" placeholder="Enter amount">
                                </div>
                            </div>
                            
                            <div class="mb-5">
                                <label class="form-label fw-bold small text-uppercase">Your Email</label>
                                <input type="email" name="email" class="form-control rounded-pill py-3 px-4" required placeholder="name@example.com">
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill py-3 fw-bold">PROCEED TO PAYMENT</button>
                            <div class="text-center mt-4">
                                <img src="https://paystack.com/assets/img/service_logos/paystack-badge-cards-gh.png" style="height: 30px;" alt="Paystack Secured">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Volunteer Card -->
            <div id="volunteer" class="col-lg-5" data-aos="fade-left">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100">
                    <div id="volunteer" class="bg-primary p-5 text-white text-center">
                        <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center mx-auto mb-4" style="width: 70px; height: 70px;">
                            <i class="fas fa-users fs-3"></i>
                        </div>
                        <h3 class="fw-bold mb-0">Join as Volunteer</h3>
                    </div>
                    <div class="card-body p-5">
                        <p class="text-muted text-center mb-5">Offer your skills and time to help us manage programs and events.</p>
                        
                        <form action="process-volunteer" method="POST">
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">First Name</label>
                                    <input type="text" name="firstname" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Last Name</label>
                                    <input type="text" name="lastname" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold small">Email Address</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold small">Phone Number</label>
                                <input type="tel" name="phone" class="form-control" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-bold small">Area of Interest</label>
                                <select name="interest" class="form-select rounded- pill py-3" required>
                                    <option value="" selected disabled>Choose...</option>
                                    <option value="healthcare">Healthcare Support</option>
                                    <option value="education">Teaching/School Support</option>
                                    <option value="event">Event Organizing</option>
                                    <option value="admin">Administrative</option>
                                </select>
                            </div>
                            <div class="mb-5">
                                <label class="form-label fw-bold small">Message/Why us?</label>
                                <textarea name="message" class="form-control" rows="3" placeholder="Tell us about yourself..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-dark btn-lg w-100 rounded-pill py-3 fw-bold">SUBMIT APPLICATION</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>
