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
    <header class="fadeInDown animated">
        <div class="in-div">
            <div class="logo">
                <img src="../../public/all-images/logo-pix/favicon.png" alt="logo" title="Logo">
            </div>
            <div class="container">
                <div class="nav-container">
                    <nav>
                        <ul>
                            <li title="Dashboard"><i class="bi bi-speedometer2"></i> Dashboard</li>
                            <li title="My Profile"><i class="bi bi-person-circle"></i> My Profile</li>
                        </ul>
                    </nav>

                    <div class="right-div">
                        <div class="icons">
                            <i class="bi bi-gear" title="System Settings"></i>
                            <i class="bi bi-bell" title="System Notification"><span id="count">3</span></i>
                        </div>

                        <div class="profile">
                            <div id="profile-name">Fortune Tech Global</div>
                            <div id="status-name">Active</div>
                        </div>

                        <div class="profile-pix" title="Profile Pix">
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

    <div class="side-nav">
        <ul>
            <li title="Dashboard"><i class="bi bi-speedometer2"></i> Dashboard</li>
            <li title="log-out"><i class="bi bi-power"></i> Log-Out</li>
        </ul>
    </div>

    <div class="body-div">
        <div class="in-div">
            <div class="body-container">
                <div class="top-div">
                    <div class="statistics profile">
                        <div class="div-in">
                            <div class="profile">
                                <div class="profile-pix" title="Profile Pix">
                                    <img src="../../public/all-images/logo-pix/avatar.jpg" alt="">
                                </div>
                                <div>
                                    <div><i class="bi bi-speedometer2"></i> Administrative Dashboard</div>
                                    <div id="fullname">Fortune Tech Global</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="statistics">
                        <div class="div-in">
                            <div class="statistics-count">
                                <div>
                                    <div class="title">Administrators</div>
                                    <div class="bottom-title">Statistics of Administrators</div>
                                    <div id="count">0</div>
                                </div>
                                <div class="icon"><i class="bi bi-people-fill"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="statistics">
                        <div class="div-in">
                            <div class="statistics-count">
                                <div>
                                    <div class="title">Administrators</div>
                                    <div class="bottom-title">Statistics of Administrators</div>
                                    <div id="count">0</div>
                                </div>
                                <div class="icon"><i class="bi bi-people-fill"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bottom-div">

                </div>
            </div>
        </div>
    </div>
</body>

</html>