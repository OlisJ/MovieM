<?php
include "includes/db.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-collapse" id='navbarNav'>
        <div class="container">
            <a href="index.php" class='navbar-brand'>Moive Booking</a>
            <button class="navbar-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class='navbar-toggle-icon'></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class='navbar-nav ms-auto'>
                    <li class='nav-item'>
                        <a href="index.php" class='nav-link'>Home</a>
                    </li>
                    <?php if(!isset($SESSION['user_id'])):?>
                        <li class="nav-item">
                            <a href="register.php" class='nav-link'>Register</a>
                        </li>
                        <li class="nav-item">
                            <a href="login.php" class="nav-link">Log In</a>
                        </li>
                        <?php else: ?>
                            <li class='nav-item'>
                                <a href="<?php echo $SESSION['role'] == 'admin'? 'admin/dashboard.php' : 'user/dashboard.php'; ?>" class="nav-link">Dashboard</a>
                            </li>

                            <li class="nav-item">
                                <a href="logout.php" class="nav-link">Log Out</a>
                            </li>
                            <?php endif?>
                
                
                </ul>
            </div>
        </div>

    </nav>

    <div class='container mt-5'>
        <h1 class='text-center'>Welcome to moive booking system</h1>
        <p>This is movie booking system</p>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>