<?php
require_once 'includes/auth.php';
check_login();
require_once '../includes/db.php';

$pageTitle = "Messages";
include 'includes/header.php';
?>

<div class="card border-0 shadow-sm overflow-hidden">
    <div class="card-header bg-white border-0 py-4 px-4">
        <h5 class="mb-0 fw-bold">Inbound Inquiries</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4">Sender</th>
                    <th>Subject</th>
                    <th>Message Snippet</th>
                    <th class="text-end pe-4">Received</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $stmt = $pdo->query("SELECT * FROM contacts ORDER BY created_at DESC");
                while($row = $stmt->fetch()): 
                ?>
                <tr>
                    <td class="ps-4">
                        <div class="fw-bold small"><?php echo htmlspecialchars($row['name']); ?></div>
                        <div class="x-small text-muted"><?php echo htmlspecialchars($row['email']); ?></div>
                    </td>
                    <td class="small fw-bold text-dark"><?php echo htmlspecialchars($row['subject']); ?></td>
                    <td class="small text-muted" style="max-width: 350px;"><?php echo htmlspecialchars($row['message']); ?></td>
                    <td class="text-end pe-4 small text-muted"><?php echo date('M d, H:i', strtotime($row['created_at'])); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
