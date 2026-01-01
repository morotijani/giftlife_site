<?php 
$pageTitle = "News & Stories";
include('includes/head.php'); 
include('includes/header.php'); 

$posts = [
    [
        'title' => "Pioneering a New Age for Children's Learning",
        'date' => 'Jan 01, 2026',
        'author' => 'Admin',
        'excerpt' => 'Our latest initiative in education has reached 500+ children in rural communities...',
        'img' => 'https://images.unsplash.com/photo-1542810634-71277d95dcbb?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
    ],
    [
        'title' => 'Healthcare Milestones: 2025 Impact Report',
        'date' => 'Dec 28, 2025',
        'author' => 'Human Jordan',
        'excerpt' => 'Reflecting on a year of medical aid, healthpost setup, and community support...',
        'img' => 'https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
    ],
    [
        'title' => 'Women Empowerment through Skills Training',
        'date' => 'Dec 15, 2025',
        'author' => 'Hayley Montana',
        'excerpt' => 'How our recent training program is changing lives for 50 women in central region...',
        'img' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
    ]
];
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
                <?php foreach($posts as $post): ?>
                <article class="mb-5 bg-white shadow-sm rounded overflow-hidden">
                    <img src="<?php echo $post['img']; ?>" class="img-fluid w-100" style="height: 400px; object-fit: cover;" alt="<?php echo $post['title']; ?>">
                    <div class="p-4 p-md-5">
                        <div class="d-flex align-items-center mb-3 text-muted small">
                            <span class="me-3"><i class="far fa-calendar-alt me-1"></i> <?php echo $post['date']; ?></span>
                            <span><i class="far fa-user me-1"></i> <?php echo $post['author']; ?></span>
                        </div>
                        <h2 class="fw-bold mb-3"><?php echo $post['title']; ?></h2>
                        <p class="text-secondary lead"><?php echo $post['excerpt']; ?></p>
                        <a href="#" class="btn btn-outline-primary mt-3">Read Full Story</a>
                    </div>
                </article>
                <?php endforeach; ?>
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
                        <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Healthcare (12)</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Education (8)</a></li>
                        <li class="mb-2"><a href="#" class="text-decoration-none text-secondary">Empowerment (5)</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Community Stories (15)</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>
