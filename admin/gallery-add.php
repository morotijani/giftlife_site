<?php
require_once 'includes/auth.php';
check_login();
require_once '../includes/db.php';

$error = null;
$success = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['images'])) {
    $title = $_POST['title'] ?? '';
    $files = $_FILES['images'];
    $uploaded_count = 0;
    
    // Create directory if not exists
    $upload_dir = '../assets/images/gallery/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    foreach ($files['name'] as $key => $name) {
        if ($files['error'][$key] === 0) {
            $file_ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $allowed_ext = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            
            if (in_array($file_ext, $allowed_ext) && $files['size'][$key] <= 5 * 1024 * 1024) {
                $new_name = uniqid('img_', true) . '.' . $file_ext;
                $target_path = $upload_dir . $new_name;
                $db_path = 'assets/images/gallery/' . $new_name;
                
                if (move_uploaded_file($files['tmp_name'][$key], $target_path)) {
                    try {
                        $stmt = $pdo->prepare("INSERT INTO gallery (title, image_path) VALUES (?, ?)");
                        $stmt->execute([$title, $db_path]);
                        $uploaded_count++;
                    } catch (PDOException $e) {
                        $error = "Database error: " . $e->getMessage();
                    }
                }
            }
        }
    }

    if ($uploaded_count > 0) {
        header("Location: gallery?success=uploaded&count=" . $uploaded_count);
        exit;
    } else {
        $error = "No valid images were uploaded.";
    }
}

$pageTitle = "Gallery";
include 'includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold mb-0">Bulk Photo Upload</h5>
                <a href="gallery" class="btn btn-light btn-sm rounded-pill px-3"><i class="fas fa-arrow-left me-2"></i> Back to Gallery</a>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-danger py-2 small border-0 rounded-3 mb-4"><i class="fas fa-exclamation-circle me-2"></i> <?php echo $error; ?></div>
            <?php endif; ?>

            <form id="uploadForm" action="gallery-add" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label class="form-label small fw-bold text-uppercase">General Title (Optional)</label>
                    <input type="text" name="title" class="form-control rounded-3 py-2" placeholder="e.g., Skills Training Session">
                    <div class="form-text x-small">This title will be applied to all uploaded photos.</div>
                </div>

                <div class="mb-4">
                    <label class="form-label small fw-bold text-uppercase">Select Images</label>
                    <div id="dropZone" class="p-5 border-dashed rounded-4 text-center bg-light position-relative" style="cursor: pointer;">
                        <input type="file" id="fileInput" name="images[]" class="position-absolute w-100 h-100 top-0 start-0 opacity-0" style="cursor: pointer;" multiple accept="image/*">
                        <i class="fas fa-images fs-1 text-muted mb-3"></i>
                        <h6 class="fw-bold">Click or Drag & Drop Photos Here</h6>
                        <p class="text-muted small mb-0">Max size: 5MB per file. Formats: JPG, PNG, WEBP</p>
                    </div>
                </div>

                <!-- Preview Area -->
                <div id="previewContainer" class="row g-3 mb-5 d-none">
                    <div class="col-12 mt-4">
                        <h6 class="fw-bold small text-uppercase mb-3">Upload Queue (<span id="fileCount">0</span>)</h6>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" id="submitBtn" class="btn btn-primary rounded-pill px-5 py-2 shadow d-none"><i class="fas fa-upload me-2"></i> Upload All Photos</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.border-dashed { border: 2px dashed #dee2e6; transition: all 0.3s ease; }
.border-dashed:hover { border-color: #720917; background-color: #fff !important; }
.preview-card { position: relative; height: 150px; }
.preview-card img { width: 100%; height: 100%; object-fit: cover; }
.remove-btn { position: absolute; top: 10px; right: 10px; background: rgba(255,0,0,0.8); color: white; border: none; width: 25px; height: 25px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; cursor: pointer; transition: all 0.2s; }
.remove-btn:hover { background: red; transform: scale(1.1); }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('fileInput');
    const previewContainer = document.getElementById('previewContainer');
    const fileCount = document.getElementById('fileCount');
    const submitBtn = document.getElementById('submitBtn');
    
    // Manage files locally using DataTransfer
    let dataTransfer = new DataTransfer();

    fileInput.addEventListener('change', function(e) {
        handleFiles(this.files);
    });

    function handleFiles(selectedFiles) {
        // Show container
        previewContainer.classList.remove('d-none');
        submitBtn.classList.remove('d-none');

        Array.from(selectedFiles).forEach((file, index) => {
            // Add to DataTransfer
            dataTransfer.items.add(file);
            
            // Create Preview UI
            const reader = new FileReader();
            reader.onload = function(event) {
                const col = document.createElement('div');
                col.className = 'col-md-3 col-sm-4 preview-item';
                col.innerHTML = `
                    <div class="preview-card border rounded-4 overflow-hidden position-relative">
                        <img src="${event.target.result}">
                        <button type="button" class="remove-btn" data-name="${file.name}"><i class="fas fa-times"></i></button>
                    </div>
                `;
                previewContainer.appendChild(col);
            }
            reader.readAsDataURL(file);
        });

        updateFileList();
    }

    // Handle Removal
    previewContainer.addEventListener('click', function(e) {
        if (e.target.closest('.remove-btn')) {
            const btn = e.target.closest('.remove-btn');
            const fileName = btn.getAttribute('data-name');
            const parent = btn.closest('.preview-item');
            
            // Remove from DataTransfer
            const newDataTransfer = new DataTransfer();
            for (let i = 0; i < dataTransfer.files.length; i++) {
                if (dataTransfer.files[i].name !== fileName) {
                    newDataTransfer.items.add(dataTransfer.files[i]);
                }
            }
            dataTransfer = newDataTransfer;
            fileInput.files = dataTransfer.files;
            
            // Remove from UI
            parent.remove();
            updateFileList();
            
            if (dataTransfer.files.length === 0) {
                previewContainer.classList.add('d-none');
                submitBtn.classList.add('d-none');
            }
        }
    });

    function updateFileList() {
        fileInput.files = dataTransfer.files;
        fileCount.textContent = dataTransfer.files.length;
    }
});
</script>

<?php include 'includes/footer.php'; ?>
