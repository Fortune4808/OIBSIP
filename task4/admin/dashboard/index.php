<?php require_once "../../public/config/config.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title><?php echo $websiteName ?> | Admin Dashboard</title>
    <?php include "./meta.php"; ?>
</head>

<body>
    <div id="overlay"></div>
    <header class="fadeInDown animated">
        <div class="in-div">
            <div class="logo">
                <img src="../../public/all-images/logo-pix/favicon.png" alt="logo" title="Logo">
            </div>
            <div class="container">
                <div class="nav-container">
                    <nav>
                        <ul>
                            <li id="header-dashboard" title="Dashboard" onclick="getPage('dashboard')"><i class="bi bi-speedometer2"></i> Dashboard</li>
                            <li title="My Profile" onclick="getForm('profile')"><i class="bi bi-person-circle"></i> My Profile</li>
                        </ul>
                    </nav>

                    <div class="right-div">
                        <div class="icons">
                            <i class="bi bi-gear" title="System Settings"></i>
                            <i class="bi bi-bell" title="System Notification"><span id="count">3</span></i>
                        </div>

                        <div class="profile-header">
                            <div id="profile-name"></div>
                            <div id="status-name"></div>
                        </div>

                        <div class="profile-pix-header" title="Profile Pix">
                            <img src="../../public/all-images/logo-pix/avatar.jpg" alt="">
                        </div>

                        <div class="mobile-nav">
                            <i class="bi bi-list"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="side-nav fadeInLeft animated">
        <ul>
            <li id="nav-dashboard" title="Dashboard" onclick="getPage('dashboard')"><i class="bi bi-speedometer2"></i> Dashboard</li>
            <li title="log-out"><i class="bi bi-power"></i> Log-Out</li>
        </ul>
    </div>

    <div class="body-div">
        <div class="in-div">
            <div class="body-container" id="main-dashboard">
                <script>
                    getPage('dashboard');
                </script>
            </div>
        </div>
    </div>
    <script>
        sessionValidation();
    </script>
</body>

</html>