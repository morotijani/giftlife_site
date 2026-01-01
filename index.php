<?php 
$pageTitle = "Home";
include('includes/head.php'); 
include('includes/header.php'); 
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="pe-lg-4">
                    <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Child Smiling" class="img-fluid rounded shadow-lg">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ps-lg-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle btn-primary d-flex align-items-center justify-content-center p-2 me-3" style="width: 40px; height: 40px;">
                            <i class="fas fa-play text-white small"></i>
                        </div>
                        <span class="text-uppercase fw-bold ls-1 small">Our Impact in Action</span>
                    </div>
                    <h1 class="hero-title">HELP US TO <span class="text-primary">SAVE</span> THE LIVES OF MANY.</h1>
                    <p class="lead text-secondary mb-5">At Gift of Life Foundation, we're dedicated to supporting women, children, and communities in need through healthcare, education, and empowerment.</p>
                    <a href="about.php" class="btn btn-dark btn-lg px-5 py-3 rounded-0">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Impact Stats Banner -->
<section class="py-5" style="background-color: #8B1D2E;">
    <div class="container">
        <div class="row text-white text-center">
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="p-4 border border-light">
                    <i class="fas fa-users fa-2x mb-3"></i>
                    <h3>Who We Are</h3>
                    <p class="small opacity-75">A collective dedicated to upliftment.</p>
                    <a href="about.php" class="text-white text-decoration-none small fw-bold">Read More <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="p-4 border border-light">
                    <i class="fas fa-hand-holding-heart fa-2x mb-3"></i>
                    <h3>Who Gets Help</h3>
                    <p class="small opacity-75">Vulnerable women and children across communities.</p>
                    <a href="projects.php" class="text-white text-decoration-none small fw-bold">Beneficiaries <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border border-light">
                    <i class="fas fa-briefcase-medical fa-2x mb-3"></i>
                    <h3>What We Do</h3>
                    <p class="small opacity-75">Healthcare, education, and basic amenities.</p>
                    <a href="projects.php" class="text-white text-decoration-none small fw-bold">Full Mission <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Campaigns -->
<section class="section-padding bg-light-gray">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-primary fw-bold text-uppercase small">Our Work</span>
            <h2 class="display-5 fw-bold mt-2">Featured Campaigns</h2>
        </div>
        
        <div class="row g-4">
            <!-- Campaign 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Education">
                    <div class="card-body p-4">
                        <div class="badge bg-primary mb-3">Education</div>
                        <h5 class="card-title fw-bold">Building Schools for Rural Kids</h5>
                        <p class="card-text text-secondary small">Access to quality education for every child regardless of their location.</p>
                        <hr class="my-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-primary">GH₵ 15,000 Goal</span>
                            <a href="get-involved.php" class="btn btn-dark btn-sm rounded-0">Donate Now</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Campaign 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1576091160550-217359f42f8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Healthcare">
                    <div class="card-body p-4">
                        <div class="badge bg-primary mb-3">Healthcare</div>
                        <h5 class="card-title fw-bold">Community Health Support</h5>
                        <p class="card-text text-secondary small">Providing medical aid and support to vulnerable groups in remote areas.</p>
                        <hr class="my-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-primary">GH₵ 10,000 Goal</span>
                            <a href="get-involved.php" class="btn btn-dark btn-sm rounded-0">Donate Now</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Campaign 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Women Empowerment">
                    <div class="card-body p-4">
                        <div class="badge bg-primary mb-3">Empowerment</div>
                        <h5 class="card-title fw-bold">Women Empowerment Skills</h5>
                        <p class="card-text text-secondary small">Skills training and resources to empower women for economic independence.</p>
                        <hr class="my-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-primary">GH₵ 8,000 Goal</span>
                            <a href="get-involved.php" class="btn btn-dark btn-sm rounded-0">Donate Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Banner -->
<section class="py-5 bg-dark text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h3 class="fw-bold mb-3">Even Tiny Donations Can Bring Life-Changing Results.</h3>
                <p class="opacity-75 mb-lg-0">Your support helps us build schools, provide healthcare, and empower women across Ghana.</p>
            </div>
            <div class="col-lg-5 text-lg-end">
                <a href="get-involved.php" class="btn btn-primary btn-lg rounded-0 px-5">Get Started</a>
            </div>
        </div>
    </div>
</section>

<!-- Latest News -->
<section class="section-padding">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <span class="text-primary fw-bold text-uppercase small">Blog & News</span>
                <h2 class="display-6 fw-bold mt-2">Latest News & Article</h2>
            </div>
            <a href="blog.php" class="btn btn-outline-primary rounded-pill px-4">See All <i class="fas fa-chevron-right ms-1 small"></i></a>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6">
                <div class="d-flex align-items-start border p-3 rounded shadow-sm hover-shadow bg-white h-100">
                    <img src="https://images.unsplash.com/photo-1542810634-71277d95dcbb?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" class="rounded me-4" style="width: 120px; height: 120px; object-fit: cover;" alt="News">
                    <div>
                        <div class="text-muted small mb-1 mt-2"><i class="far fa-calendar-alt me-2"></i> Jan 01, 2026</div>
                        <h6 class="fw-bold">Pioneering a New Age for Children's Learning</h6>
                        <a href="blog.php" class="text-primary fw-bold small text-decoration-none">Read More <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start border p-3 rounded shadow-sm hover-shadow bg-white h-100">
                    <img src="https://images.unsplash.com/photo-1533227268408-a774695d9ae9?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" class="rounded me-4" style="width: 120px; height: 120px; object-fit: cover;" alt="News">
                    <div>
                        <div class="text-muted small mb-1 mt-2"><i class="far fa-calendar-alt me-2"></i> Dec 28, 2025</div>
                        <h6 class="fw-bold">Impact Report: Healthcare Milestones in 2025</h6>
                        <a href="blog.php" class="text-primary fw-bold small text-decoration-none">Read More <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>
