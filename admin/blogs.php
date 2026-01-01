<?php
require_once 'includes/auth.php';
check_login();
require_once '../includes/db.php';

// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM blogs WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: blogs?success=deleted");
    exit;
}

$pageTitle = "Blogs";
include 'includes/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Article Management</h5>
    <a href="blog-add" class="btn btn-primary btn-sm rounded-pill px-4"><i class="fas fa-plus me-2"></i> Add New Post</a>
</div>

<?php if(isset($_GET['success'])): ?>
    <div class="alert alert-success py-2 small mb-4">Action completed successfully!</div>
<?php endif; ?>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="border-0 px-4">Image</th>
                        <th class="border-0">Title</th>
                        <th class="border-0">Author</th>
                        <th class="border-0">Date</th>
                        <th class="border-0 text-end px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $stmt = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC");
                    while($row = $stmt->fetch()): 
                    ?>
                    <tr>
                        <td class="px-4">
                            <img src="<?php echo htmlspecialchars($row['image']); ?>" class="rounded" style="width: 50px; height: 50px; object-fit: cover;" alt="">
                        </td>
                        <td>
                            <div class="fw-bold small"><?php echo htmlspecialchars($row['title']); ?></div>
                            <div class="x-small text-muted"><?php echo htmlspecialchars($row['slug']); ?></div>
                        </td>
                        <td class="small"><?php echo htmlspecialchars($row['author']); ?></td>
                        <td class="small text-muted"><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                        <td class="text-end px-4">
                            <a href="blog-edit?id=<?php echo $row['id']; ?>" class="btn btn-light btn-sm me-1" title="Edit"><i class="fas fa-edit text-primary"></i></a>
                            <a href="blogs?delete=<?php echo $row['id']; ?>" class="btn btn-light btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this post?')"><i class="fas fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
