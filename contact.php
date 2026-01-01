<?php 
$pageTitle = "Contact Us";
include('includes/head.php'); 
include('includes/header.php'); 
?>

<!-- Internal Hero -->
<section class="py-5 bg-light-gray">
    <div class="container py-5 text-center">
        <h1 class="display-4 fw-bold">Contact Us</h1>
        <p class="lead">Have questions or want to partner? Reach out to us.</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <h3 class="fw-bold mb-4">Get in Touch</h3>
                <div class="d-flex mb-4">
                    <div class="text-primary me-4 fs-3"><i class="fas fa-map-marker-alt"></i></div>
                    <div>
                        <h6 class="fw-bold mb-1">Our Office</h6>
                        <p class="text-secondary mb-0">123 Foundation Way, Accra, Ghana</p>
                    </div>
                </div>
                <div class="d-flex mb-4">
                    <div class="text-primary me-4 fs-3"><i class="fas fa-phone-alt"></i></div>
                    <div>
                        <h6 class="fw-bold mb-1">Phone Number</h6>
                        <p class="text-secondary mb-0">+233 24 000 0000</p>
                    </div>
                </div>
                <div class="d-flex mb-4">
                    <div class="text-primary me-4 fs-3"><i class="fas fa-envelope"></i></div>
                    <div>
                        <h6 class="fw-bold mb-1">Email Address</h6>
                        <p class="text-secondary mb-0">info@giftlifefoundation.org</p>
                    </div>
                </div>
                
                <hr class="my-5">
                
                <h6 class="fw-bold mb-3">Follow Us</h6>
                <div class="social-links">
                    <a href="#" class="btn btn-outline-dark btn-sm rounded-circle me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-outline-dark btn-sm rounded-circle me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="btn btn-outline-dark btn-sm rounded-circle me-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn btn-outline-dark btn-sm rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
            <div class="col-lg-7">
                <div class="bg-white p-4 p-md-5 shadow-sm rounded">
                    <form action="process-contact.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium">Your Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-medium">Email Address</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-medium">Subject</label>
                            <input type="text" class="form-control" name="subject" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-medium">Message</label>
                            <textarea class="form-control" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Placeholder -->
<section class="bg-light">
    <div class="ratio ratio-21x9">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127063.12571764654!2d-0.26442034999999996!3d5.59120895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf9084b2b7a773%3A0xbed1ca19275de52d!2sAccra!5e0!3m2!1sen!2sgh!4v1690000000000!5m2!1sen!2sgh" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section>

<?php include('includes/footer.php'); ?>
