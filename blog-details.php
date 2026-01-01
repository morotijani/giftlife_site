<?php 
require_once 'includes/db.php';

$slug = $_GET['slug'] ?? '';

if (empty($slug)) {
    header("Location: blog");
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM blogs WHERE slug = ?");
    $stmt->execute([$slug]);
    $post = $stmt->fetch();
} catch (PDOException $e) {
    $post = null;
}

if (!$post) {
    header("Location: blog");
    exit;
}

$pageTitle = htmlspecialchars($post['title']) . " | Blog";
include('includes/head.php'); 
include('includes/header.php'); 
?>

<!-- Modern Article Header -->
<section class="py-5 bg-dark text-white text-center position-relative overflow-hidden">
    <div class="container py-5 position-relative" style="z-index: 2;" data-aos="fade-up">
        <div class="mb-4">
            <span class="badge bg-primary px-3 py-2 rounded-pill shadow-sm">Impact Story</span>
        </div>
        <h1 class="display-3 fw-bold mb-3"><?php echo htmlspecialchars($post['title']); ?></h1>
        <div class="d-flex justify-content-center align-items-center opacity-75 small text-uppercase letter-spacing-1">
            <span class="me-4"><i class="far fa-calendar-alt text-primary me-2"></i> <?php echo date('M d, Y', strtotime($post['created_at'])); ?></span>
            <span><i class="far fa-user text-primary me-2"></i> By <?php echo htmlspecialchars($post['author']); ?></span>
        </div>
    </div>
    <div class="position-absolute w-100 h-100 top-0 start-0 opacity-20" style="background: url('<?php echo htmlspecialchars($post['image']); ?>'); background-size: cover; background-position: center; filter: blur(5px);"></div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row g-5 justify-content-center">
            <div class="col-lg-9">
                <!-- Featured Image -->
                <div class="mb-5 rounded-4 overflow-hidden shadow-lg" data-aos="fade-up">
                    <img src="<?php echo htmlspecialchars($post['image']); ?>" class="img-fluid w-100" style="max-height: 600px; object-fit: cover;" alt="<?php echo htmlspecialchars($post['title']); ?>">
                </div>

                <!-- Article Content -->
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm post-content" data-aos="fade-up" data-aos-delay="100">
                    <div class="lead fs-5 mb-4 text-dark lh-base" style="font-weight: 500;">
                        <?php 
                        // Show first paragraph as lead
                        $paragraphs = explode("\n", $post['content']);
                        echo nl2br(htmlspecialchars(array_shift($paragraphs)));
                        ?>
                    </div>
                    
                    <div class="text-muted fs-6 lh-lg">
                        <?php 
                        // Show rest of content
                        echo nl2br(htmlspecialchars(implode("\n", $paragraphs)));
                        ?>
                    </div>

                    <hr class="my-5 opacity-10">

                    <!-- Social Share -->
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-4">
                        <div class="d-flex align-items-center gap-3">
                            <span class="fw-bold small text-uppercase">Share this Story:</span>
                            <a href="#" class="btn btn-light rounded-circle shadow-sm" style="width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center;"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn btn-light rounded-circle shadow-sm" style="width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center;"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-light rounded-circle shadow-sm" style="width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center;"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <a href="blog" class="btn btn-outline-primary rounded-pill px-4"><i class="fas fa-arrow-left me-2"></i> Back to Blog</a>
                    </div>
                </div>

                <!-- Related Posts -->
                <div class="mt-5 pt-5 border-top">
                    <h3 class="fw-bold mb-4" data-aos="fade-right">More Impact Stories</h3>
                    <div class="row g-4">
                        <?php 
                        $stmt = $pdo->prepare("SELECT * FROM blogs WHERE id != ? ORDER BY RAND() LIMIT 2");
                        $stmt->execute([$post['id']]);
                        while($related = $stmt->fetch()):
                        ?>
                        <div class="col-md-6" data-aos="zoom-in">
                            <div class="card h-100 hover-shadow shadow-sm overflow-hidden p-3 bg-white border-0">
                                <div class="position-relative overflow-hidden rounded-4">
                                    <img src="<?php echo htmlspecialchars($related['image']); ?>" class="card-img-top rounded-4" style="height: 200px; object-fit: cover;" alt="">
                                </div>
                                <div class="card-body px-1 py-3">
                                    <h6 class="fw-bold mb-2"><?php echo htmlspecialchars($related['title']); ?></h6>
                                    <a href="blog-details?slug=<?php echo $related['slug']; ?>" class="text-primary fw-bold x-small text-decoration-none text-uppercase">Read More <i class="fas fa-chevron-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modern CTA Section -->
<section class="py-5 bg-primary text-white text-center">
    <div class="container py-4" data-aos="zoom-in">
        <h2 class="display-6 fw-bold mb-4">Support Our Ongoing Missions</h2>
        <div class="d-flex justify-content-center gap-3">
            <a href="get-involved" class="btn btn-light btn-lg rounded-pill px-5">Donate Now</a>
            <a href="get-involved#volunteer" class="btn btn-outline-light btn-lg rounded-pill px-5">Volunteer</a>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>
