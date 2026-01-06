<?php 
$pageTitle = "Contact Us - Let's Talk Impact";
include('includes/head.php'); 
include('includes/header.php'); 
?>

<!-- Modern Header -->
<section class="py-5 bg-dark text-white text-center position-relative overflow-hidden">
    <div class="container py-5 position-relative" style="z-index: 2;" data-aos="fade-up">
        <h1 class="display-3 fw-bold mb-3">Connect <span class="text-primary">With Us</span></h1>
        <p class="lead opacity-75 mx-auto" style="max-width: 600px;">Have questions or want to partner? Fill the form below or use our contact details.</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Info -->
            <div class="col-lg-4" data-aos="fade-right">
                <div class="p-5 bg-primary text-white rounded-4 h-100">
                    <h3 class="fw-bold mb-5">Contact Information</h3>
                    
                    <div class="d-flex mb-5">
                        <div class="me-4 fs-3 opacity-75"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Our Location</h6>
                            <p class="small mb-0 opacity-75">123 Charity Lane, Accra, Ghana.</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-5">
                        <div class="me-4 fs-3 opacity-75"><i class="fas fa-phone-alt"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Phone Number</h6>
                            <p class="small mb-0 opacity-75">+233 54 557 9406</p>
                            <p class="small mb-0 opacity-75">+233 20 529 2440</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-5">
                        <div class="me-4 fs-3 opacity-75"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Email Support</h6>
                            <p class="small mb-0 opacity-75">info@haruzafoundation.org</p>
                            <p class="small mb-0 opacity-75">donations@haruzafoundation.org</p>
                        </div>
                    </div>
                    
                    <div class="mt-5 pt-4">
                        <h6 class="fw-bold mb-3">Follow Our Journey</h6>
                        <div class="d-flex gap-3">
                            <a href="https://www.facebook.com/profile.php?id=100067127297208" class="btn btn-outline-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn btn-outline-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-outline-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="col-lg-8" data-aos="fade-left">
                <div class="bg-white p-5 rounded-4 shadow-sm border h-100">
                    <h3 class="fw-bold mb-4">Send Us a Message</h3>
                    <form action="process-contact" method="POST">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small">Full Name</label>
                                <input type="text" name="name" class="form-control rounded-4 py-3" placeholder="Kwaku Frimpong" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small">Email Address</label>
                                <input type="email" name="email" class="form-control rounded-4 py-3" placeholder="kwakufrimpong@example.com" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold small">Subject</label>
                                <input type="text" name="subject" class="form-control rounded-4 py-3" placeholder="How can we help?" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold small">Message</label>
                                <textarea name="message" class="form-control rounded-4 py-3" rows="6" placeholder="Your message here..." required></textarea>
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5 py-3 shadow">SEND MESSAGE NOW</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Maps Section -->
<section class="p-0 position-relative" style="height: 450px;">
    <iframe class="w-100 h-100 grayscale" style="border:0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7949.03024958734!2d-1.6312766587693508!3d5.019853529826463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfe7624dbe88bc67%3A0x5e58e1fff05097d5!2sShama!5e0!3m2!1sen!2sgh!4v1767473407136!5m2!1sen!2sgh" allowfullscreen="" loading="lazy"></iframe>
</section>

<?php include('includes/footer.php'); ?>
