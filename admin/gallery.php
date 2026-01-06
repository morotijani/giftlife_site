<?php
require_once 'includes/auth.php';
check_login();
require_once '../includes/db.php';

// Handle deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    // First get the image path to delete the file
    $stmt = $pdo->prepare("SELECT image_path FROM gallery WHERE id = ?");
    $stmt->execute([$id]);
    $image = $stmt->fetch();
    
    if ($image) {
        $file_path = "../" . $image['image_path'];
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        
        $stmt = $pdo->prepare("DELETE FROM gallery WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: gallery?success=deleted");
    } else {
        header("Location: gallery?error=notfound");
    }
    exit;
}

$pageTitle = "Gallery";
include 'includes/header.php';
?>

<div class="card border-0 shadow-sm overflow-hidden">
    <div class="card-header bg-white border-0 py-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Impact Gallery</h5>
        <a href="gallery-add" class="btn btn-primary rounded-pill px-4 btn-sm shadow"><i class="fas fa-plus me-2"></i> Upload Photo</a>
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
                    <th>Title</th>
                    <th>Date Added</th>
                    <th class="text-end pe-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $stmt = $pdo->query("SELECT * FROM gallery ORDER BY created_at DESC");
                while($row = $stmt->fetch()): 
                ?>
                <tr>
                    <td class="ps-4">
                        <img src="../<?php echo htmlspecialchars($row['image_path']); ?>" class="rounded-3 shadow-sm" style="width: 80px; height: 60px; object-fit: cover;" alt="">
                    </td>
                    <td>
                        <div class="fw-bold small"><?php echo htmlspecialchars($row['title'] ?: 'Untitled'); ?></div>
                    </td>
                    <td class="small text-muted"><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                    <td class="text-end pe-4">
                        <a href="gallery?delete=<?php echo $row['id']; ?>" class="btn btn-light btn-sm rounded-circle" title="Delete" onclick="return confirm('Are you sure you want to delete this photo?')"><i class="fas fa-trash-alt text-danger"></i></a>
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php if ($stmt->rowCount() == 0): ?>
                <tr>
                    <td colspan="4" class="text-center py-5 text-muted">No images found in gallery.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
