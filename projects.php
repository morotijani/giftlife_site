<?php 
$pageTitle = "Explore Our Impact Projects";
include('includes/head.php'); 
include('includes/header.php'); 

$projects = [
    [
        'title' => 'The Shepherd Support',
        'category' => 'Education',
        'desc' => 'Providing educational materials and support to community schools in rural areas.',
        'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'delay' => 100
    ],
    [
        'title' => 'Community Donations for All',
        'category' => 'Community',
        'desc' => 'Monthly distribution of essential supplies, food, and clothing to families in need.',
        'image' => 'https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'delay' => 200
    ],
    [
        'title' => 'Women Empowerment Initiatives',
        'category' => 'Empowerment',
        'desc' => 'Skills training and startup tools for women to build sustainable livelihoods.',
        'image' => 'https://images.unsplash.com/photo-1544027993-37dbfe43562a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'delay' => 300
    ],
    [
        'title' => 'Medical Post Construction',
        'category' => 'Healthcare',
        'desc' => 'Building and equipping health posts in areas with limited medical access.',
        'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'delay' => 400
    ],
    [
        'title' => 'School Building Project',
        'category' => 'Infrastructure',
        'desc' => 'Constructing modern classrooms and learning centers for underprivileged children.',
        'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'delay' => 500
    ],
    [
        'title' => 'The Red Charity Project',
        'category' => 'Healthcare',
        'desc' => 'Specialized medical aid and support for vulnerable mothers and infants.',
        'image' => 'https://images.unsplash.com/photo-1584515933487-759f2121f2ec?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'delay' => 600
    ]
];
?>

<!-- Modern Header -->
<section class="py-5 bg-primary text-white text-center position-relative overflow-hidden">
    <div class="container py-5 position-relative" style="z-index: 2;" data-aos="fade-up">
        <h1 class="display-3 fw-bold mb-3">Our <span class="text-dark">Impact</span> Projects</h1>
        <p class="lead opacity-75 mx-auto" style="max-width: 600px;">Explore the initiatives that are changing lives and building stronger communities across the nation.</p>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <!-- Filter Tabs -->
        <div class="d-flex justify-content-center flex-wrap gap-2 mb-5" data-aos="fade-up">
            <button class="btn btn-primary rounded-pill px-4">All Projects</button>
            <button class="btn btn-light rounded-pill px-4 shadow-sm">Education</button>
            <button class="btn btn-light rounded-pill px-4 shadow-sm">Healthcare</button>
            <button class="btn btn-light rounded-pill px-4 shadow-sm">Empowerment</button>
        </div>
        
        <div class="row g-4 mt-2">
            <?php foreach($projects as $project): ?>
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="<?php echo $project['delay']; ?>">
                <div class="card h-100 hover-shadow shadow-sm overflow-hidden p-3 bg-white">
                    <div class="position-relative overflow-hidden rounded-4">
                        <img src="<?php echo $project['image']; ?>" class="card-img-top rounded-4" style="height: 250px; object-fit: cover;" alt="<?php echo $project['title']; ?>">
                        <div class="badge bg-primary position-absolute top-0 end-0 m-3 shadow-sm"><?php echo $project['category']; ?></div>
                    </div>
                    <div class="card-body px-1 py-4">
                        <h4 class="fw-bold mb-3"><?php echo $project['title']; ?></h4>
                        <p class="card-text text-muted small lh-lg"><?php echo $project['desc']; ?></p>
                        <hr class="my-4 opacity-10">
                        <a href="get-involved" class="btn btn-outline-primary w-100 rounded-pill">Support This Project</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section-padding bg-dark text-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7" data-aos="fade-right">
                <h2 class="display-5 fw-bold mb-4">Have a Project in Mind?</h2>
                <p class="lead opacity-75 mb-0">We are always looking for new ways to make an impact. If you have an idea or want to partner on a specific community goal, reach out to us today.</p>
            </div>
            <div class="col-lg-5 text-lg-end" data-aos="fade-left">
                <a href="contact" class="btn btn-primary btn-lg px-5 py-3 rounded-pill">Collaborate With Us</a>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>
