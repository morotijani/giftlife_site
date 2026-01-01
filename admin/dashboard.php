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

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm p-3 h-100">
            <div class="d-flex align-items-center">
                <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">
                    <i class="fas fa-envelope text-primary fa-lg"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1 small">Contacts</h6>
                    <h4 class="mb-0 fw-bold"><?php echo $contacts_count; ?></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm p-3 h-100">
            <div class="d-flex align-items-center">
                <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3">
                    <i class="fas fa-hands-helping text-success fa-lg"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1 small">Volunteers</h6>
                    <h4 class="mb-0 fw-bold"><?php echo $volunteers_count; ?></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm p-3 h-100">
            <div class="d-flex align-items-center">
                <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3">
                    <i class="fas fa-heart text-warning fa-lg"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1 small">Donations</h6>
                    <h4 class="mb-0 fw-bold">GH₵ <?php echo number_format($donations_sum, 2); ?></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm p-3 h-100">
            <div class="d-flex align-items-center">
                <div class="rounded-circle bg-info bg-opacity-10 p-3 me-3">
                    <i class="fas fa-newspaper text-info fa-lg"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1 small">Blogs</h6>
                    <h4 class="mb-0 fw-bold"><?php echo $blogs_count; ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 py-3">
                <h6 class="mb-0 fw-bold">Recent Donations</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0 px-4">Donor</th>
                                <th class="border-0">Amount</th>
                                <th class="border-0">Date</th>
                                <th class="border-0">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $stmt = $pdo->query("SELECT * FROM donations ORDER BY created_at DESC LIMIT 5");
                            while($row = $stmt->fetch()): 
                            ?>
                            <tr>
                                <td class="px-4">
                                    <div class="fw-bold small"><?php echo htmlspecialchars($row['name']); ?></div>
                                    <div class="text-muted small"><?php echo htmlspecialchars($row['email']); ?></div>
                                </td>
                                <td>GH₵ <?php echo number_format($row['amount'], 2); ?></td>
                                <td class="small text-muted"><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                                <td>
                                    <span class="badge bg-<?php echo $row['status'] == 'success' ? 'success' : ($row['status'] == 'pending' ? 'warning' : 'danger'); ?> rounded-pill small" style="font-size: 0.7rem;">
                                        <?php echo ucfirst($row['status']); ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 py-3">
                <h6 class="mb-0 fw-bold">Recent Contacts</h6>
            </div>
            <div class="card-body">
                <?php 
                $stmt = $pdo->query("SELECT * FROM contacts ORDER BY created_at DESC LIMIT 4");
                while($row = $stmt->fetch()): 
                ?>
                <div class="d-flex mb-3 border-bottom pb-3">
                    <div class="me-3">
                        <div class="rounded bg-light text-primary d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="fas fa-user text-primary" style="color: #8B1D2E !important;"></i>
                        </div>
                    </div>
                    <div>
                        <div class="fw-bold small"><?php echo htmlspecialchars($row['name']); ?></div>
                        <div class="text-muted small text-truncate" style="max-width: 150px;"><?php echo htmlspecialchars($row['subject']); ?></div>
                        <div class="x-small text-muted mt-1 opacity-50"><?php echo date('M d, H:i', strtotime($row['created_at'])); ?></div>
                    </div>
                </div>
                <?php endwhile; ?>
                <a href="contacts" class="btn btn-light w-100 btn-sm text-primary fw-bold" style="color: #8B1D2E !important;">View All Messages</a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
