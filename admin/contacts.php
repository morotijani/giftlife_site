<?php
require_once 'includes/auth.php';
check_login();
require_once '../includes/db.php';

$pageTitle = "Contacts";
include 'includes/header.php';
?>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="border-0 px-4">Name</th>
                        <th class="border-0">Email</th>
                        <th class="border-0">Subject</th>
                        <th class="border-0">Message</th>
                        <th class="border-0 text-end px-4">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $stmt = $pdo->query("SELECT * FROM contacts ORDER BY created_at DESC");
                    while($row = $stmt->fetch()): 
                    ?>
                    <tr>
                        <td class="px-4 fw-bold small"><?php echo htmlspecialchars($row['name']); ?></td>
                        <td class="small text-muted"><?php echo htmlspecialchars($row['email']); ?></td>
                        <td class="small fw-medium"><?php echo htmlspecialchars($row['subject']); ?></td>
                        <td class="small text-secondary" style="max-width: 300px;"><?php echo htmlspecialchars($row['message']); ?></td>
                        <td class="text-end px-4 small text-muted"><?php echo date('M d, Y H:i', strtotime($row['created_at'])); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
