<?php
require_once 'includes/auth.php';
check_login();
require_once '../includes/db.php';

$pageTitle = "Donations";
include 'includes/header.php';
?>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="border-0 px-4">Donor</th>
                        <th class="border-0">Amount</th>
                        <th class="border-0">Reference</th>
                        <th class="border-0">Status</th>
                        <th class="border-0 text-end px-4">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $stmt = $pdo->query("SELECT * FROM donations ORDER BY created_at DESC");
                    while($row = $stmt->fetch()): 
                    ?>
                    <tr>
                        <td class="px-4 fw-bold small">
                            <?php echo htmlspecialchars($row['name']); ?>
                            <div class="x-small text-muted fw-normal"><?php echo htmlspecialchars($row['email']); ?></div>
                        </td>
                        <td class="fw-bold">GH₵ <?php echo number_format($row['amount'], 2); ?></td>
                        <td class="x-small text-muted"><?php echo htmlspecialchars($row['reference']); ?></td>
                        <td>
                            <span class="badge bg-<?php echo $row['status'] == 'success' ? 'success' : ($row['status'] == 'pending' ? 'warning' : 'danger'); ?> rounded-pill x-small">
                                <?php echo ucfirst($row['status']); ?>
                            </span>
                        </td>
                        <td class="text-end px-4 small text-muted"><?php echo date('M d, Y H:i', strtotime($row['created_at'])); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
