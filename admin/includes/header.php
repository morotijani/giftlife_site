<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> | Admin Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { 
            --sidebar-width: 260px; 
            --primary-dark: #720917; 
            --accent-bg: #fdfdfd; 
            --glass-bg: rgba(255, 255, 255, 0.9);
        }
        body { background: #f4f7f6; font-family: 'Inter', sans-serif; color: #333; }
        .sidebar { 
            width: var(--sidebar-width); 
            height: 100vh; 
            position: fixed; 
            background: #111; 
            color: white; 
            transition: all 0.3s; 
            z-index: 1000;
            box-shadow: 10px 0 30px rgba(0,0,0,0.05);
        }
        .main-content { margin-left: var(--sidebar-width); padding: 40px; min-height: 100vh; }
        .nav-link { 
            color: rgba(255,255,255,0.6); 
            padding: 14px 25px; 
            border-radius: 12px; 
            margin: 4px 15px;
            transition: all 0.2s;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .nav-link:hover { color: white; background: rgba(255,255,255,0.05); }
        .nav-link.active { color: white; background: var(--primary-dark); box-shadow: 0 4px 15px rgba(114, 9, 23, 0.3); }
        .nav-link i { width: 25px; font-size: 1.1rem; }
        .card { border: none; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.02); }
        .top-nav { background: var(--glass-bg); backdrop-filter: blur(10px); sticky-top; padding: 15px 40px; }
        .x-small { font-size: 0.7rem; letter-spacing: 1px; }
        .btn-primary { background: var(--primary-dark); border: none; border-radius: 10px; padding: 10px 20px; box-shadow: 0 4px 10px rgba(114, 9, 23, 0.2); }
        .table thead th { background: #fbfbfb; border-bottom: none; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #888; padding: 15px 20px; }
        .table tbody td { padding: 15px 20px; border-bottom: 1px solid #f8f8f8; }
    </style>
</head>
<body>
    <div class="sidebar d-none d-md-block">
        <div class="p-4 mb-4 mt-2">
            <h5 class="fw-bold mb-0 text-white"><i class="fas fa-heart text-primary me-2"></i> HARUZA</h5>
            <span class="x-small opacity-50 text-uppercase d-block mt-1">Founders Dashboard</span>
        </div>
        <nav class="nav flex-column">
            <a class="nav-link <?php echo $pageTitle == 'Dashboard' ? 'active' : ''; ?>" href="dashboard"><i class="fas fa-grid-2 me-2"></i><i class="fas fa-th-large me-2"></i> Dashboard</a>
            <a class="nav-link <?php echo $pageTitle == 'Blogs' ? 'active' : ''; ?>" href="blogs"><i class="fas fa-file-alt me-2"></i> Manage Blogs</a>
            <hr class="mx-4 opacity-10">
            <a class="nav-link <?php echo $pageTitle == 'Contacts' ? 'active' : ''; ?>" href="contacts"><i class="fas fa-comment-alt me-2"></i> Messages</a>
            <a class="nav-link <?php echo $pageTitle == 'Volunteers' ? 'active' : ''; ?>" href="volunteers"><i class="fas fa-user-friends me-2"></i> Volunteers</a>
            <a class="nav-link <?php echo $pageTitle == 'Gallery' ? 'active' : ''; ?>" href="gallery"><i class="fas fa-images me-2"></i> Manage Gallery</a>
            <a class="nav-link <?php echo $pageTitle == 'Donations' ? 'active' : ''; ?>" href="donations"><i class="fas fa-wallet me-2"></i> Donations</a>
            
            <div class="mt-auto px-4 py-5 w-100">
                <a href="logout" class="btn btn-outline-light btn-sm w-100 rounded-pill border-opacity-25 opacity-75"><i class="fas fa-power-off me-2"></i> Logout</a>
            </div>
        </nav>
    </div>

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h3 class="fw-bold mb-1 text-dark"><?php echo $pageTitle; ?></h3>
                <p class="text-muted small mb-0">Welcome back, <?php echo $_SESSION['admin_username']; ?></p>
            </div>
            <div class="dropdown">
                <button class="btn btn-white bg-white shadow-sm border-0 dropdown-toggle px-4 py-2 rounded-4" type="button" data-bs-toggle="dropdown">
                    <img src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['admin_username']; ?>&background=720917&color=fff" class="rounded-circle me-2" style="width: 25px;"> 
                    <span class="small fw-bold"><?php echo $_SESSION['admin_username']; ?></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-4 p-2">
                    <li><a class="dropdown-item rounded-3 py-2 small" href="../index" target="_blank"><i class="fas fa-external-link-alt me-2 text-primary"></i> Live Website</a></li>
                    <li><hr class="dropdown-divider opacity-5"></li>
                    <li><a class="dropdown-item rounded-3 py-2 small text-danger" href="logout"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                </ul>
            </div>
        </div>
