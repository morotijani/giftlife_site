<?php
require_once 'includes/auth.php';
check_login();
require_once '../includes/db.php';

// Fetch stats
$contacts_count = $pdo->query("SELECT COUNT(*) FROM contacts")->fetchColumn();
$volunteers_count = $pdo->query("SELECT COUNT(*) FROM volunteers")->fetchColumn();
$donations_sum = $pdo->query("SELECT SUM(amount) FROM donations WHERE status = 'success'")->fetchColumn() ?: 0;
$blogs_count = $pdo->query("SELECT COUNT(*) FROM blogs")->fetchColumn();

$pageTitle = "Dashboard";
include 'includes/header.php';
?>

<div class="row g-4 mb-5">
    <div class="col-xl-3 col-md-6">
        <div class="card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="rounded-4 bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="fas fa-wallet text-primary"></i>
                </div>
                <div class="text-success small fw-bold">+12% <i class="fas fa-arrow-up"></i></div>
            </div>
            <h6 class="text-muted mb-1 small text-uppercase letter-spacing-1">Total Funds</h6>
            <h3 class="mb-0 fw-bold">GH₵ <?php echo number_format($donations_sum, 2); ?></h3>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="rounded-4 bg-info bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="fas fa-user-friends text-info"></i>
                </div>
                <div class="text-info small fw-bold">Active</div>
            </div>
            <h6 class="text-muted mb-1 small text-uppercase letter-spacing-1">Volunteers</h6>
            <h3 class="mb-0 fw-bold"><?php echo $volunteers_count; ?></h3>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="rounded-4 bg-warning bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="fas fa-envelope-open-text text-warning"></i>
                </div>
                <div class="text-muted small">New Msgs</div>
            </div>
            <h6 class="text-muted mb-1 small text-uppercase letter-spacing-1">Messages</h6>
            <h3 class="mb-0 fw-bold"><?php echo $contacts_count; ?></h3>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="rounded-4 bg-dark bg-opacity-10 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="fas fa-newspaper text-dark"></i>
                </div>
                <div class="text-muted small">Articles</div>
            </div>
            <h6 class="text-muted mb-1 small text-uppercase letter-spacing-1">Published</h6>
            <h3 class="mb-0 fw-bold"><?php echo $blogs_count; ?></h3>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm overflow-hidden">
            <div class="card-header bg-white border-0 py-4 px-4 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Latest Donations</h5>
                <a href="donations" class="btn btn-light btn-sm rounded-pill px-3">View History</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Donor</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $stmt = $pdo->query("SELECT * FROM donations ORDER BY created_at DESC LIMIT 6");
                        while($row = $stmt->fetch()): 
                        ?>
                        <tr>
                            <td>
                                <div class="fw-bold small"><?php echo htmlspecialchars($row['name']); ?></div>
                                <div class="text-muted x-small"><?php echo htmlspecialchars($row['email']); ?></div>
                            </td>
                            <td class="fw-bold fs-6">GH₵ <?php echo number_format($row['amount'], 2); ?></td>
                            <td>
                                <?php if($row['status'] == 'success'): ?>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill x-small">COMPLETED</span>
                                <?php elseif($row['status'] == 'pending'): ?>
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill x-small">PENDING</span>
                                <?php else: ?>
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill x-small">FAILED</span>
                                <?php endif; ?>
                            </td>
                            <td class="small text-muted"><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 py-4 px-4">
                <h5 class="mb-0 fw-bold">Quick Actions</h5>
            </div>
            <div class="card-body px-4 pt-0">
                <div class="d-grid gap-2">
                    <a href="blog-add" class="btn btn-primary text-start rounded-4 p-3 mb-2">
                        <i class="fas fa-plus-circle me-2"></i> Create New Article
                    </a>
                    <a href="blogs" class="btn btn-light text-start rounded-4 p-3 mb-2">
                        <i class="fas fa-edit me-2"></i> Manage Blogs
                    </a>
                    <a href="volunteers" class="btn btn-light text-start rounded-4 p-3 mb-2">
                        <i class="fas fa-user-check me-2"></i> Review Volunteers
                    </a>
                </div>
                
                <div class="mt-4 p-4 bg-primary bg-opacity-10 rounded-4">
                    <h6 class="fw-bold mb-2">System Health</h6>
                    <div class="d-flex justify-content-between small mb-1">
                        <span>Database</span>
                        <span class="text-success fw-bold">Online</span>
                    </div>
                    <div class="d-flex justify-content-between small">
                        <span>API Status</span>
                        <span class="text-success fw-bold">Stable</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
