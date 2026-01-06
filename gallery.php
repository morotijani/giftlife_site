<?php 
require_once 'includes/db.php';
$pageTitle = "Impact Gallery - Visual Stories";
include('includes/head.php'); 
include('includes/header.php'); 
?>

<!-- Modern Header -->
<section class="py-5 bg-dark text-white text-center position-relative overflow-hidden">
    <div class="container py-5 position-relative" style="z-index: 2;" data-aos="fade-up">
        <h1 class="display-3 fw-bold mb-3">Our <span class="text-primary">Impact</span> Gallery</h1>
        <p class="lead opacity-75 mx-auto" style="max-width: 600px;">A visual journey through our missions, training programs, and community support initiatives.</p>
    </div>
    <div class="position-absolute w-100 h-100 top-0 start-0 opacity-20" style="background: url('assets/images/bg-7.jpg'); background-size: cover; background-position: center;"></div>
</section>

<section class="section-padding bg-light">
    <div class="container">
        <div class="row g-4" id="gallery-grid">
            <?php 
            try {
                $stmt = $pdo->query("SELECT * FROM gallery ORDER BY created_at DESC");
                $images = $stmt->fetchAll();
                
                if (count($images) > 0):
                    foreach($images as $img):
            ?>
            <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                <div class="gallery-item rounded-4 overflow-hidden position-relative shadow-sm h-100">
                    <a href="<?php echo htmlspecialchars($img['image_path']); ?>" class="gallery-lightbox">
                        <img src="<?php echo htmlspecialchars($img['image_path']); ?>" class="img-fluid w-100 h-100" style="object-fit: cover; min-height: 300px;" alt="<?php echo htmlspecialchars($img['title']); ?>">
                        <div class="gallery-overlay d-flex align-items-end p-4">
                            <div class="text-white">
                                <h6 class="fw-bold mb-0"><?php echo htmlspecialchars($img['title'] ?: 'Foundation Impact'); ?></h6>
                                <span class="x-small opacity-75"><?php echo date('M Y', strtotime($img['created_at'])); ?></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <?php 
                    endforeach;
                else:
            ?>
            <div class="col-12 text-center py-5">
                <div class="opacity-25 mb-3">
                    <i class="fas fa-images display-1"></i>
                </div>
                <h4 class="text-muted">No photos in our gallery yet.</h4>
                <p class="text-muted">Stay tuned for updates on our latest projects.</p>
            </div>
            <?php 
                endif;
            } catch (PDOException $e) {
                echo "<div class='alert alert-danger'>Error loading gallery.</div>";
            }
            ?>
        </div>
    </div>
</section>

<!-- Lightbox Script (Using a simple CDN-based lightbox for premium feel) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.2.0/css/glightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.2.0/js/glightbox.min.js"></script>

<style>
.gallery-item {
    transition: transform 0.3s ease;
}
.gallery-item:hover {
    transform: translateY(-5px);
}
.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.gallery-item:hover .gallery-overlay {
    opacity: 1;
}
.gallery-item img {
    transition: transform 0.5s ease;
}
.gallery-item:hover img {
    transform: scale(1.1);
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lightbox = GLightbox({
            selector: '.gallery-lightbox',
            touchNavigation: true,
            loop: true
        });
    });
</script>

<?php include('includes/footer.php'); ?>
