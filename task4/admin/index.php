<?php require_once "../public/config/config.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title><?php echo $websiteName ?> | Signup & Login Page</title>
    <?php include "./meta.php"; ?>
</head>

<body>
    <div class="bg fadeIn animated">
        <img src="./all-images//bg/left-bg.jpg" alt="left background">
    </div>

    <div class="right-div">
        <header class="fadeInDown animated">
            <div class="in-div">
                <a href="<?php echo $websiteUrl; ?>">
                    <div class="logo">
                        <img src="../public/all-images/logo-pix/favicon.png" alt="logo" title="Logo">
                    </div>
                </a>

                <a href="<?php echo $websiteUrl; ?>">Back to website</a>
            </div>
        </header>

        <div class="body-form">
            <div class="in-div fadeIn animated" id="main">
                <?php $page = 'log-in'; ?>
                <?php include "./config/form.php" ?>
            </div>
        </div>
    </div>
</body>

</html>