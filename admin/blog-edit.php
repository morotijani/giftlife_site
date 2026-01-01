<?php
require_once 'includes/auth.php';
check_login();
require_once '../includes/db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: blogs");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM blogs WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch();

if (!$post) {
    header("Location: blogs");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    $author = $_POST['author'];
    $image = $_POST['image'];
    $content = $_POST['content'];
    
    try {
        $stmt = $pdo->prepare("UPDATE blogs SET title = ?, slug = ?, author = ?, image = ?, content = ? WHERE id = ?");
        $stmt->execute([$title, $slug, $author, $image, $content, $id]);
        header("Location: blogs?success=updated");
        exit;
    } catch (PDOException $e) {
        $error = "Error updating post: " . $e->getMessage();
    }
}

$pageTitle = "Edit Blog Post";
include 'includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger py-2 small"><?php echo $error; ?></div>
                <?php endif; ?>
                <form method="POST">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label small fw-bold">Post Title</label>
                            <input type="text" name="title" class="form-control" required value="<?php echo htmlspecialchars($post['title']); ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Author Name</label>
                            <input type="text" name="author" class="form-control" required value="<?php echo htmlspecialchars($post['author']); ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Image URL</label>
                            <input type="url" name="image" class="form-control" required value="<?php echo htmlspecialchars($post['image']); ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Article Content</label>
                            <textarea name="content" class="form-control" rows="10" required><?php echo htmlspecialchars($post['content']); ?></textarea>
                        </div>
                        <div class="col-12 mt-4 text-end">
                            <a href="blogs" class="btn btn-light rounded-pill px-4 me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary rounded-pill px-5">Update Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
