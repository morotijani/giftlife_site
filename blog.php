<?php 
require_once 'includes/db.php';
$pageTitle = "Latest News & Impact Stories";
include('includes/head.php'); 
include('includes/header.php'); 

// Fetch blogs from database
try {
    $stmt = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC");
    $posts = $stmt->fetchAll();
} catch (PDOException $e) {
    $posts = [];
}
?>

<!-- Modern Header -->
<section class="py-5 bg-dark text-white text-center position-relative overflow-hidden">
    <div class="container py-5 position-relative" style="z-index: 2;" data-aos="fade-up">
        <h1 class="display-3 fw-bold mb-3">Impact <span class="text-primary">Stories</span></h1>
        <p class="lead opacity-75 mx-auto" style="max-width: 600px;">Voices from the ground, milestones achieved, and the journey of transformation.</p>
    </div>
    <div class="position-absolute w-100 h-100 top-0 start-0 opacity-10" style="background: url('assets/images/bg-2.jpg'); background-size: cover;"></div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <?php if (empty($posts)): ?>
                    <div class="alert alert-info rounded-4 p-4 border-0 shadow-sm" data-aos="fade-up">
                        <i class="fas fa-info-circle me-2"></i> No stories found yet. We're busy creating impact, check back soon!
                    </div>
                <?php else: ?>
                    <?php foreach($posts as $post): ?>
                    <article class="mb-5 bg-white shadow-sm rounded-4 overflow-hidden" data-aos="fade-up">
                        <div class="position-relative overflow-hidden">
                            <img src="<?php echo htmlspecialchars($post['image']); ?>" class="img-fluid w-100 hover-zoom" style="height: 450px; object-fit: cover;" alt="<?php echo htmlspecialchars($post['title']); ?>">
                            <div class="position-absolute bottom-0 start-0 p-4">
                                <div class="badge bg-primary px-3 py-2 rounded-pill shadow">Latest Update</div>
                            </div>
                        </div>
                        <div class="p-4 p-md-5">
                            <div class="d-flex align-items-center mb-3 text-muted x-small text-uppercase letter-spacing-1">
                                <span class="me-4"><i class="far fa-calendar-alt text-primary me-2"></i> <?php echo date('M d, Y', strtotime($post['created_at'])); ?></span>
                                <span><i class="far fa-user text-primary me-2"></i> By <?php echo htmlspecialchars($post['author']); ?></span>
                            </div>
                            <h2 class="fw-bold mb-3"><?php echo htmlspecialchars($post['title']); ?></h2>
                            <p class="text-muted lead fs-6 mb-4"><?php echo substr(strip_tags($post['content']), 0, 180) . '...'; ?></p>
                            <a href="blog-details?slug=<?php echo $post['slug']; ?>" class="btn btn-outline-primary rounded-pill px-5">Continue Reading</a>
                        </div>
                    </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <div class="col-lg-4">
                <div class="position-sticky" style="top: 100px;">
                    <div class="bg-white p-4 shadow-sm rounded-4 mb-4" data-aos="fade-left">
                        <h5 class="fw-bold mb-3">Stay Integrated</h5>
                        <p class="small text-muted mb-4">Subscribe to our monthly impact digest directly to your inbox.</p>
                        <form>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Your Email Address">
                            </div>
                            <button class="btn btn-primary w-100 rounded-pill">Join Newsletter</button>
                        </form>
                    </div>
                    
                    <div class="bg-dark text-white p-5 shadow-sm rounded-4 mb-4" data-aos="fade-left" data-aos-delay="100">
                        <i class="fas fa-quote-left display-4 text-primary opacity-50 mb-4"></i>
                        <p class="fst-italic opacity-75">"Education is the most powerful weapon which you can use to change the world."</p>
                        <h6 class="fw-bold mb-0 text-primary">— Nelson Mandela</h6>
                    </div>
                    
                    <div class="bg-white p-4 shadow-sm rounded-4" data-aos="fade-left" data-aos-delay="200">
                        <h5 class="fw-bold mb-3">Categories</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="#" class="btn btn-light btn-sm rounded-pill px-3">Healthcare</a>
                            <a href="#" class="btn btn-light btn-sm rounded-pill px-3">Education</a>
                            <a href="#" class="btn btn-light btn-sm rounded-pill px-3">Community</a>
                            <a href="#" class="btn btn-light btn-sm rounded-pill px-3">Empowerment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>
