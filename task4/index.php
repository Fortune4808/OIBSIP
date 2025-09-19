<?php require_once "./public/config/config.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $websiteName; ?> | Landing Page</title>
    <?php include "./meta.php"; ?>
</head>

<body>
    <section class="header-section">
        <header class="fadeInDown animated">
            <div class="in-div">
                <a href="<?php echo $websiteUrl; ?>">
                    <div class="logo">
                        <img src="./public/all-images/logo-pix/favicon.png" alt="logo" title="Logo">
                    </div>
                </a>
                <a href="<?php echo $websiteUrl; ?>/admin"><button title="Admin Login">Admin Signup / Login <i class="bi bi-arrow-right"></i></button></a>
            </div>
        </header>
    </section>

    <section class="slide-section">
        <div class="slide-in">
            <div class="container">
                <div class="text-content fadeInLeft animated">
                    <h1>Welcome to <?php echo $websiteName; ?>
                        <span></span>
                    </h1>
                    <p>
                        This is a beginner-friendly user authentication system developed using PHP. It features a secure login and registration process, allowing users to create accounts and log in with their credentials. Passwords are safely stored using hashing techniques to enhance security and prevent unauthorized access. The system also includes session management to protect restricted pages and ensure users remain logged in securely.
                    </p>

                    <div class="btn-container">
                        <a href="<?php echo $websiteUrl; ?>/admin"><button title="Admin Login">Admin Signup / Login <i class="bi bi-arrow-right"></i></button></a>
                    </div>
                </div>

                <div class="image-div fadeInDown animated">
                    <img src="./all-images/body/body.png" alt="">
                </div>
            </div>
        </div>
    </section>
</body>

</html>