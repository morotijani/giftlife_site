<?php
require_once 'includes/auth.php';
check_login();
require_once '../includes/db.php';

$pageTitle = "Finance & Donations";
include 'includes/header.php';
?>

<div class="card border-0 shadow-sm overflow-hidden">
    <div class="card-header bg-white border-0 py-4 px-4">
        <h5 class="mb-0 fw-bold">Transaction History</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4">Donor Details</th>
                    <th>Transaction Ref</th>
                    <th>Amount</th>
                    <th>Verification</th>
                    <th class="text-end pe-4">Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $stmt = $pdo->query("SELECT * FROM donations ORDER BY created_at DESC");
                while($row = $stmt->fetch()): 
                ?>
                <tr>
                    <td class="ps-4">
                        <div class="fw-bold small text-dark"><?php echo htmlspecialchars($row['name']); ?></div>
                        <div class="x-small text-muted"><?php echo htmlspecialchars($row['email']); ?></div>
                    </td>
                    <td class="x-small font-monospace text-muted"><?php echo htmlspecialchars($row['reference']); ?></td>
                    <td class="fw-bold text-dark fs-6">GH₵ <?php echo number_format($row['amount'], 2); ?></td>
                    <td>
                        <?php if($row['status'] == 'success'): ?>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill x-small px-3">VERIFIED</span>
                        <?php elseif($row['status'] == 'pending'): ?>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill x-small px-3">IN PROGRESS</span>
                        <?php else: ?>
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill x-small px-3">DECLINED</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end pe-4 small text-muted"><?php echo date('M d, H:i', strtotime($row['created_at'])); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
