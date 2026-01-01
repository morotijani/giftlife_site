<?php
require_once 'includes/auth.php';
check_login();
require_once '../includes/db.php';

$pageTitle = "Volunteers";
include 'includes/header.php';
?>

<div class="card border-0 shadow-sm overflow-hidden">
    <div class="card-header bg-white border-0 py-4 px-4">
        <h5 class="mb-0 fw-bold">Service Applications</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4">Applicant</th>
                    <th>Contact</th>
                    <th>Interest Area</th>
                    <th>Motivation</th>
                    <th class="text-end pe-4">Applied On</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $stmt = $pdo->query("SELECT * FROM volunteers ORDER BY created_at DESC");
                while($row = $stmt->fetch()): 
                ?>
                <tr>
                    <td class="ps-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                                <span class="fw-bold x-small text-primary"><?php echo substr($row['first_name'], 0, 1); ?></span>
                            </div>
                            <div class="fw-bold small"><?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></div>
                        </div>
                    </td>
                    <td>
                        <div class="small fw-medium text-dark"><?php echo htmlspecialchars($row['email']); ?></div>
                        <div class="x-small text-muted"><?php echo htmlspecialchars($row['phone']); ?></div>
                    </td>
                    <td>
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill x-small px-3">
                            <?php echo strtoupper($row['interest']); ?>
                        </span>
                    </td>
                    <td class="small text-muted" style="max-width: 250px;"><?php echo htmlspecialchars($row['message']); ?></td>
                    <td class="text-end pe-4 small text-muted"><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
