<?php
session_start();

?>
<div class="container">
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="about.php" class="nav-link px-2">About</a></li>
            <?php if (isset($_SESSION["username"])):  ?>

                <li><a href="details.php" class="nav-link px-2">Details</a></li>

            <?php endif; ?>
        </ul>

        <div class="col-md-3 text-end">

            <?php if (empty($_SESSION["username"])):  ?>
                <a class="btn btn-outline-primary me-2" href="login.php">Login</a>
                <a class="btn btn-primary" href="register.php">Sign-up</a>
            <?php else: ?>
                <a class="btn btn-outline-primary me-2" href="logout.php">Logout</a>

            <?php endif; ?>

        </div>
    </header>
</div>