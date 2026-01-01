<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> | Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --sidebar-width: 250px; --primary-dark: #8B1D2E; }
        body { background: #f4f7f6; font-family: 'Inter', sans-serif; }
        .sidebar { width: var(--sidebar-width); height: 100vh; position: fixed; background: var(--primary-dark); color: white; transition: all 0.3s; z-index: 1000; }
        .main-content { margin-left: var(--sidebar-width); padding: 30px; min-height: 100vh; }
        .nav-link { color: rgba(255,255,255,0.7); padding: 12px 20px; border-radius: 0; border-left: 4px solid transparent; }
        .nav-link:hover, .nav-link.active { color: white; background: rgba(255,255,255,0.1); border-left-color: white; }
        .nav-link i { width: 25px; }
        .top-nav { background: white; padding: 15px 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        .x-small { font-size: 0.75rem; }
    </style>
</head>
<body>
    <div class="sidebar d-none d-md-block">
        <div class="p-4 text-center">
            <h5 class="fw-bold mb-0">Gift of Life</h5>
            <span class="x-small opacity-50 text-uppercase">Admin Panel</span>
        </div>
        <nav class="nav flex-column mt-3">
            <a class="nav-link <?php echo $pageTitle == 'Dashboard' ? 'active' : ''; ?>" href="dashboard"><i class="fas fa-home"></i> Dashboard</a>
            <a class="nav-link <?php echo $pageTitle == 'Blogs' ? 'active' : ''; ?>" href="blogs"><i class="fas fa-newspaper"></i> Manage Blogs</a>
            <a class="nav-link <?php echo $pageTitle == 'Contacts' ? 'active' : ''; ?>" href="contacts"><i class="fas fa-envelope"></i> Contacts</a>
            <a class="nav-link <?php echo $pageTitle == 'Volunteers' ? 'active' : ''; ?>" href="volunteers"><i class="fas fa-hands-helping"></i> Volunteers</a>
            <a class="nav-link <?php echo $pageTitle == 'Donations' ? 'active' : ''; ?>" href="donations"><i class="fas fa-heart"></i> Donations</a>
            <div class="mt-auto px-4 py-4 w-100">
                <a href="logout" class="btn btn-outline-light btn-sm w-100"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
            </div>
        </nav>
    </div>

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0"><?php echo $pageTitle; ?></h4>
            <div class="dropdown">
                <button class="btn btn-white shadow-sm border-0 dropdown-toggle px-3" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user-circle me-2 text-primary"></i> <?php echo $_SESSION['admin_username']; ?>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                    <li><a class="dropdown-item py-2" href="../index" target="_blank small"><i class="fas fa-external-link-alt me-2"></i> Visit Site</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item py-2 text-danger" href="logout"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                </ul>
            </div>
        </div>
