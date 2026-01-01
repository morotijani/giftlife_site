<?php 
$pageTitle = "Our Projects";
include('includes/head.php'); 
include('includes/header.php'); 

$projects = [
    [
        'title' => 'Building Schools',
        'category' => 'Education',
        'desc' => 'Building schools to give kids access to quality education in rural communities.',
        'img' => 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
        'icon' => 'fa-school'
    ],
    [
        'title' => 'Healthpost Setup',
        'category' => 'Healthcare',
        'desc' => 'Setting up health facilities for better community healthcare and emergency response.',
        'img' => 'https://images.unsplash.com/photo-1538108197017-c1b99a07c39e?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
        'icon' => 'fa-hospital'
    ],
    [
        'title' => 'Medical Aid Support',
        'category' => 'Healthcare',
        'desc' => 'Providing medical aid and support to those who need it most in underserved areas.',
        'img' => 'https://images.unsplash.com/photo-1505751172876-fa1923c5c528?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
        'icon' => 'fa-stethoscope'
    ],
    [
        'title' => 'Women Empowerment',
        'category' => 'Empowerment',
        'desc' => 'Skills training and resources to empower women for sustainable livelihoods.',
        'img' => 'https://images.unsplash.com/photo-1531206715517-5c0ba140b2b8?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
        'icon' => 'fa-female'
    ],
    [
        'title' => 'School Support for Kids',
        'category' => 'Education',
        'desc' => 'Helping children get into and stay in school with supplies and scholarships.',
        'img' => 'https://images.unsplash.com/photo-1546410531-bb4caa6b424d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
        'icon' => 'fa-book-reader'
    ],
    [
        'title' => 'Community Donations',
        'category' => 'Outreach',
        'desc' => 'Offering cash and in-kind support to vulnerable groups and orphanages.',
        'img' => 'https://images.unsplash.com/photo-1469571486292-0ba38a0f16db?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
        'icon' => 'fa-gift'
    ]
];
?>

<!-- Internal Hero -->
<section class="py-5 bg-light-gray" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1489914169085-9b54fdd8f2a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1500&q=80'); background-size: cover; background-position: center; color: white;">
    <div class="container py-5 text-center">
        <h1 class="display-4 fw-bold">Our Impact Projects</h1>
        <p class="lead">Turning compassion into action through sustainable community projects.</p>
    </div>
</section>

<!-- Projects Grid -->
<section class="section-padding">
    <div class="container">
        <div class="row g-4">
            <?php foreach($projects as $project): ?>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm project-card">
                    <div class="position-relative">
                        <img src="<?php echo $project['img']; ?>" class="card-img-top" alt="<?php echo $project['title']; ?>" style="height: 250px; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 m-3">
                            <span class="badge bg-primary px-3 py-2"><?php echo $project['category']; ?></span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-box me-3 text-primary">
                                <i class="fas <?php echo $project['icon']; ?> fa-lg"></i>
                            </div>
                            <h5 class="card-title fw-bold mb-0"><?php echo $project['title']; ?></h5>
                        </div>
                        <p class="card-text text-secondary small"><?php echo $project['desc']; ?></p>
                    </div>
                    <div class="card-footer bg-white border-0 p-4 pt-0">
                        <a href="get-involved" class="btn btn-outline-primary w-100 rounded-0">Support Project</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Stats Recap -->
<section class="py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-6 col-md-3">
                <h2 class="fw-bold text-primary mb-0">10+</h2>
                <p class="text-secondary small">Schools Built</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="fw-bold text-primary mb-0">5k+</h2>
                <p class="text-secondary small">Children Supported</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="fw-bold text-primary mb-0">150+</h2>
                <p class="text-secondary small">Women Empowered</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="fw-bold text-primary mb-0">20+</h2>
                <p class="text-secondary small">Communities Reached</p>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>
