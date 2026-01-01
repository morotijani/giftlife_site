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

$pageTitle = "Manage Blogs";
include 'includes/header.php';
?>

<div class="card border-0 shadow-sm overflow-hidden">
    <div class="card-header bg-white border-0 py-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Impact Articles</h5>
        <a href="blog-add" class="btn btn-primary rounded-pill px-4 btn-sm shadow"><i class="fas fa-plus me-2"></i> Create Article</a>
    </div>
    
    <?php if(isset($_GET['success'])): ?>
        <div class="px-4">
            <div class="alert alert-success py-2 small border-0 rounded-3"><i class="fas fa-check-circle me-2"></i> Action completed successfully!</div>
        </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="ps-4">Preview</th>
                    <th>Title & Slug</th>
                    <th>Author</th>
                    <th>Published Date</th>
                    <th class="text-end pe-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $stmt = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC");
                while($row = $stmt->fetch()): 
                ?>
                <tr>
                    <td class="ps-4">
                        <img src="<?php echo htmlspecialchars($row['image']); ?>" class="rounded-3 shadow-sm" style="width: 60px; height: 60px; object-fit: cover;" alt="">
                    </td>
                    <td>
                        <div class="fw-bold small"><?php echo htmlspecialchars($row['title']); ?></div>
                        <div class="x-small text-muted opacity-50"><?php echo htmlspecialchars($row['slug']); ?></div>
                    </td>
                    <td class="small fw-medium text-dark"><?php echo htmlspecialchars($row['author']); ?></td>
                    <td class="small text-muted"><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                    <td class="text-end pe-4">
                        <a href="blog-edit?id=<?php echo $row['id']; ?>" class="btn btn-light btn-sm rounded-circle me-1" title="Edit"><i class="fas fa-pencil-alt text-primary"></i></a>
                        <a href="blogs?delete=<?php echo $row['id']; ?>" class="btn btn-light btn-sm rounded-circle" title="Delete" onclick="return confirm('Are you sure you want to delete this post?')"><i class="fas fa-trash-alt text-danger"></i></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
