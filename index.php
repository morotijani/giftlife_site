<?php 
require_once 'includes/db.php';
$pageTitle = "Modern Healthcare & Education for All";
include('includes/head.php'); 
include('includes/header.php'); 
?>

<!-- Premium Hero Section -->
<section class="hero-section min-vh-100 d-flex align-items-center position-relative overflow-hidden" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/images/hero.jpg'); background-size: cover; background-position: center;">
    <div class="container position-relative" style="z-index: 2;">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="badge bg-primary px-3 py-2 mb-4 rounded-pill">EMPOWERING COMMUNITIES</div>
                <h1 class="display-2 fw-bold text-white mb-4">GIVE THE <span style="color: #FFD700;">GIFT</span> OF A BETTER LIFE</h1>
                <p class="lead text-white-50 mb-5 fs-4">We are dedicated to supporting women, children, and communities through sustainable healthcare, quality education, and economic empowerment.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="get-involved" class="btn btn-primary btn-lg px-5 py-3 rounded-pill">Start Donating</a>
                    <a href="about" class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill">Our Mission</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Wave Shape Divider -->
    <div class="position-absolute bottom-0 w-100" style="margin-bottom: -1px;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </div>
</section>

<!-- Impact Stats with Animation -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="impact-stat-card border-0 p-4">
                    <div class="display-4 fw-bold text-primary mb-2">5k+</div>
                    <div class="h5 fw-bold text-dark mb-3">Youth Skilled</div>
                    <p class="text-muted small">Equipping young Ghanaians with market-ready vocational and digital skills.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="impact-stat-card border-0 p-4" style="background: var(--primary-color); color: white;">
                    <div class="display-4 fw-bold mb-2">30+</div>
                    <div class="h5 fw-bold mb-3">Community Projects</div>
                    <p class="opacity-75 small">Constructing essential social amenities like water points and community centers.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="impact-stat-card border-0 p-4">
                    <div class="display-4 fw-bold text-primary mb-2">2k+</div>
                    <div class="h5 fw-bold text-dark mb-3">Women Empowered</div>
                    <p class="text-muted small">Providing startup capital and business training for female-led micro-enterprises.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Projects Carousel Style -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="text-primary fw-bold text-uppercase small letter-spacing-2">What We Do</span>
            <h2 class="display-5 fw-bold mt-2">Active Impact Campaigns</h2>
            <div class="mx-auto mt-3" style="width: 80px; height: 3px; background: var(--primary-color);"></div>
        </div>
        
        <div class="row g-4 mt-4">
            <!-- Campaign 1 -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                <div class="card h-100 hover-shadow shadow-sm overflow-hidden">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Education">
                        <div class="badge bg-primary position-absolute top-0 end-0 m-3">Education</div>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold mb-3">Build a Village School</h5>
                        <p class="card-text text-muted small">Help us build a safe learning environment for 200 children in the Northern Region.</p>
                        <div class="progress mb-3 mt-4" style="height: 8px;">
                            <div class="progress-bar bg-primary" style="width: 65%;"></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small fw-bold text-muted">65% Raised</span>
                            <span class="small fw-bold text-primary">GH₵ 15,000 Goal</span>
                        </div>
                        <a href="get-involved" class="btn btn-primary w-100 mt-4 rounded-pill">Donate Now</a>
                    </div>
                </div>
            </div>
            
            <!-- Campaign 2 -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="card h-100 hover-shadow shadow-sm overflow-hidden">
                    <div class="position-relative">
                        <img src="assets/images/projects/pj-1.jpg" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Healthcare">
                        <div class="badge bg-success position-absolute top-0 end-0 m-3">Healthcare</div>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold mb-3">Mobile Medical Clinic</h5>
                        <p class="card-text text-muted small">Providing primary healthcare and vaccines to remote farming communities.</p>
                        <div class="progress mb-3 mt-4" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: 40%;"></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small fw-bold text-muted">40% Raised</span>
                            <span class="small fw-bold text-primary">GH₵ 10,000 Goal</span>
                        </div>
                        <a href="get-involved" class="btn btn-outline-primary w-100 mt-4 rounded-pill">Back Project</a>
                    </div>
                </div>
            </div>
            
            <!-- Campaign 3 -->
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                <div class="card h-100 hover-shadow shadow-sm overflow-hidden">
                    <div class="position-relative">
                        <img src="assets/images/projects/pj-2.jpg" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Women Empowerment">
                        <div class="badge bg-warning position-absolute top-0 end-0 m-3">Empowerment</div>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold mb-3">Youth Skills Lab</h5>
                        <p class="card-text text-muted small">Equipping young entrepreneurs with digital skills and startup funding.</p>
                        <div class="progress mb-3 mt-4" style="height: 8px;">
                            <div class="progress-bar bg-warning" style="width: 85%;"></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small fw-bold text-muted">85% Raised</span>
                            <span class="small fw-bold text-primary">GH₵ 8,000 Goal</span>
                        </div>
                        <a href="get-involved" class="btn btn-outline-primary w-100 mt-4 rounded-pill">Support Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="projects" class="btn btn-link text-primary fw-bold text-decoration-none">Explore All Projects <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>

<!-- Modern CTA Section -->
<section class="py-5 bg-dark position-relative overflow-hidden">
    <div class="container py-5 text-center position-relative" style="z-index: 2;" data-aos="fade-up">
        <h2 class="display-4 fw-bold text-white mb-4">You Can Make a Difference Today</h2>
        <p class="lead text-white-50 mb-5 mx-auto" style="max-width: 700px;">Your generosity fuels our mission to bring sustainable change. Every cedi brings us closer to a world where everyone has a chance to thrive.</p>
        <div class="d-flex justify-content-center gap-4 flex-wrap">
            <a href="get-involved" class="btn btn-primary btn-lg px-5 py-3 rounded-pill">Give Now</a>
            <a href="get-involved#volunteer" class="btn btn-light btn-lg px-5 py-3 rounded-pill">Become a Volunteer</a>
        </div>
    </div>
</section>

<!-- Latest News Grid -->
<section class="section-padding">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5" data-aos="fade-right">
            <div>
                <span class="text-primary fw-bold text-uppercase small letter-spacing-2">In the News</span>
                <h2 class="display-5 fw-bold mt-2">Latest Stories</h2>
            </div>
            <a href="blog" class="btn btn-outline-primary rounded-pill px-4">View Blog</a>
        </div>
        
        <div class="row g-4">
            <?php 
            try {
                $stmt = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC LIMIT 2");
                $latest_posts = $stmt->fetchAll();
            } catch (PDOException $e) {
                $latest_posts = [];
            }
            
            $delay = 100;
            foreach($latest_posts as $post):
            ?>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                <div class="card border-0 shadow-sm overflow-hidden h-100 bg-light p-3">
                    <div class="row g-0 align-items-center">
                        <div class="col-4">
                            <img src="<?php echo htmlspecialchars($post['image']); ?>" class="img-fluid rounded-3 h-100 w-100" style="object-fit: cover; height: 120px;" alt="">
                        </div>
                        <div class="col-8">
                            <div class="ps-4">
                                <div class="text-muted x-small mb-1"><i class="far fa-calendar-alt me-2"></i> <?php echo date('M d, Y', strtotime($post['created_at'])); ?></div>
                                <h6 class="fw-bold mb-2"><?php echo htmlspecialchars($post['title']); ?></h6>
                                <a href="blog-details?slug=<?php echo $post['slug']; ?>" class="text-primary fw-bold x-small text-decoration-none text-uppercase">Read Story <i class="fas fa-chevron-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                $delay += 100;
            endforeach; 
            ?>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>
