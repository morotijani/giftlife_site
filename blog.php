<?php 
require_once 'includes/db.php';
$pageTitle = "News & Stories";
include('includes/head.php'); 
include('includes/header.php'); 

// Fetch blogs from database
try {
    $stmt = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC");
    $posts = $stmt->fetchAll();
} catch (PDOException $e) {
    $posts = [];
    // Log error
}
?>

<!-- Internal Hero -->
<section class="py-5 bg-light-gray">
    <div class="container py-5">
        <h1 class="display-5 fw-bold mb-0">Latest News & Stories</h1>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <?php if (empty($posts)): ?>
                    <div class="alert alert-info">No news articles found yet. Check back soon!</div>
                <?php else: ?>
                    <?php foreach($posts as $post): ?>
                    <article class="mb-5 bg-white shadow-sm rounded overflow-hidden">
                        <img src="<?php echo htmlspecialchars($post['image']); ?>" class="img-fluid w-100" style="height: 400px; object-fit: cover;" alt="<?php echo htmlspecialchars($post['title']); ?>">
                        <div class="p-4 p-md-5">
                            <div class="d-flex align-items-center mb-3 text-muted small">
                                <span class="me-3"><i class="far fa-calendar-alt me-1"></i> <?php echo date('M d, Y', strtotime($post['created_at'])); ?></span>
                                <span><i class="far fa-user me-1"></i> <?php echo htmlspecialchars($post['author']); ?></span>
                            </div>
                            <h2 class="fw-bold mb-3"><?php echo htmlspecialchars($post['title']); ?></h2>
                            <p class="text-secondary lead"><?php echo substr(strip_tags($post['content']), 0, 150) . '...'; ?></p>
                            <a href="blog-details?slug=<?php echo $post['slug']; ?>" class="btn btn-outline-primary mt-3">Read Full Story</a>
                        </div>
                    </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <div class="col-lg-4">
                <div class="bg-white p-4 shadow-sm mb-4">
                    <h5 class="fw-bold mb-3">Newsletter</h5>
                    <p class="small text-muted">Stay updated with our latest impact reports.</p>
                    <form>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email Address">
                        </div>
                        <button class="btn btn-primary w-100">Subscribe</button>
                    </form>
                </div>
                
                <div class="bg-white p-4 shadow-sm">
                    <h5 class="fw-bold mb-3">Categories</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Healthcare</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Education</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Empowerment</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Community Stories</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>
