<?php if ($page == 'profile') { ?>
    <div class="profile-card fadeInRight animated">
        <div class="header">
            <div class="in-div">
                <strong style="font-size: 14px;"><i class="bi bi-person-fill" style="color: var(--secondary-color);"></i> My Profile</strong>
                <div class="close" title="close" onclick="alertClose()">X</div>
            </div>
        </div>
        <div class="body-form">
            <div class="div-in">
                <div class="profile">
                    <div class="profile-pix" title="Profile Pix">
                        <img id="pictureBox3" alt="">
                    </div>
                    <div>
                        <strong id="profile-fullname" style="font-size: 30px; white-space: nowrap;"></strong>
                        <div style="display: flex; gap:5px; color:#333; align-items:center;"><span id="status"></span><span style="font-size: 10px; padding-top:3px"> | LAST LOGIN DATE:</span><span id="lastLogin" style="font-style: italic; font-weight:600; font-size:10px; padding-top:3px"></span></div>
                    </div>
                </div>
                <div style="padding-top: 20px; padding-bottom:20px;">
                    <div class="border">BASIC INFORMATION</div>
                    <div class="form-container">
                        <div class="form">
                            <label for="Title"><i class="bi bi-people-fill"></i> Title</label>
                            <select id="titleId" class="text-field">

                            </select>
                        </div>
                        <div class="form">
                            <label for="Email Address"><i class="bi bi-person-circle"></i> First Name</label>
                            <input type="text" class="text-field" placeholder="Enter your First Name" id="firstName">
                        </div>
                        <div class="form">
                            <label for="Email Address"><i class="bi bi-person-circle"></i> Middle Name</label>
                            <input type="text" class="text-field" placeholder="Enter your Middle Name" id="middleName">
                        </div>
                        <div class="form">
                            <label for="Email Address"><i class="bi bi-person-circle"></i> Last Name</label>
                            <input type="text" class="text-field" placeholder="Enter your Last Name" id="lastName">
                        </div>
                        <div class="form">
                            <label for="Home Address"><i class="bi bi-geo-alt-fill"></i> Home Address</label>
                            <input type="text" class="text-field" placeholder="Enter your Home Address" id="homeAddress">
                        </div>
                    </div>
                    <div class="border">CONTACT INFORMATION</div>
                    <div class="form-container">
                        <div class="form">
                            <label for="Phone Number"><i class="bi bi-telephone-forward-fill"></i> Phone Number</label>
                            <input type="text" class="text-field" placeholder="Enter your Phone Number" id="phoneNumber">
                        </div>
                        <div class="form">
                            <label for="Email Address"><i class="bi bi-envelope-fill"></i> Email Address</label>
                            <input type="text" class="text-field" placeholder="Enter your Email Address" id="emailAddress">
                        </div>
                    </div>
                    <div class="border">ACCOUNT INFORMATION</div>
                    <div class="form-container">
                        <div class="form">
                            <label for="Registration ID"><i class="bi bi-person-badge-fill"></i> Registration ID</label>
                            <input type="text" class="text-field" placeholder="" readonly id="registrationId">
                        </div>
                        <div class="form">
                            <label for="Registration Date"><i class="bi bi-alarm-fill"></i> Registration Date</label>
                            <input type="text" class="text-field" placeholder="" readonly id="registrationDate">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            getAuthProfile();
        </script>
    </div>
<?php } ?>

<?php if ($page == 'staffProfile') { ?>
    <div class="profile-card fadeInRight animated">
        <div class="header">
            <div class="in-div">
                <strong style="font-size: 14px;"><i class="bi bi-person-fill" style="color: var(--secondary-color);"></i> My Profile</strong>
                <div class="close" title="close" onclick="alertClose()">X</div>
            </div>
        </div>
        <div class="body-form">
            <div class="div-in">
                <div class="profile">
                    <div class="profile-pix" title="Profile Pix">
                        <img id="passport" alt="">
                    </div>
                    <div>
                        <strong id="profile-fullname" style="font-size: 30px; white-space: nowrap;"></strong>
                        <div style="display: flex; gap:5px; color:#333; align-items:center;"><span id="status"></span><span style="font-size: 10px; padding-top:3px"> | LAST LOGIN DATE:</span><span id="lastLogin" style="font-style: italic; font-weight:600; font-size:10px; padding-top:3px"></span></div>
                    </div>
                </div>
                <div style="padding-top: 20px; padding-bottom:20px;">
                    <div class="border">BASIC INFORMATION</div>
                    <div class="form-container">
                        <div class="form">
                            <label for="Title"><i class="bi bi-people-fill"></i> Title</label>
                            <select id="titleId" class="text-field">

                            </select>
                        </div>
                        <div class="form">
                            <label for="Email Address"><i class="bi bi-person-circle"></i> First Name</label>
                            <input type="text" class="text-field" placeholder="Enter your First Name" id="firstName">
                        </div>
                        <div class="form">
                            <label for="Email Address"><i class="bi bi-person-circle"></i> Middle Name</label>
                            <input type="text" class="text-field" placeholder="Enter your Middle Name" id="middleName">
                        </div>
                        <div class="form">
                            <label for="Email Address"><i class="bi bi-person-circle"></i> Last Name</label>
                            <input type="text" class="text-field" placeholder="Enter your Last Name" id="lastName">
                        </div>
                        <div class="form">
                            <label for="Home Address"><i class="bi bi-geo-alt-fill"></i> Home Address</label>
                            <input type="text" class="text-field" placeholder="Enter your Home Address" id="homeAddress">
                        </div>
                    </div>
                    <div class="border">CONTACT INFORMATION</div>
                    <div class="form-container">
                        <div class="form">
                            <label for="Phone Number"><i class="bi bi-telephone-forward-fill"></i> Phone Number</label>
                            <input type="text" class="text-field" placeholder="Enter your Phone Number" id="phoneNumber">
                        </div>
                        <div class="form">
                            <label for="Email Address"><i class="bi bi-envelope-fill"></i> Email Address</label>
                            <input type="text" class="text-field" placeholder="Enter your Email Address" id="emailAddress">
                        </div>
                    </div>
                    <div class="border">ACCOUNT INFORMATION</div>
                    <div class="form-container">
                        <div class="form">
                            <label for="Registration ID"><i class="bi bi-person-badge-fill"></i> Registration ID</label>
                            <input type="text" class="text-field" placeholder="" readonly id="registrationId">
                        </div>
                        <div class="form">
                            <label for="Registration Date"><i class="bi bi-alarm-fill"></i> Registration Date</label>
                            <input type="text" class="text-field" placeholder="" readonly id="registrationDate">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'logout') { ?>
    <div class="logout-container">
        <div class="logout zoomIn animated">
            <div class="image-div"><img src="../../public/all-images/image-pix/warning.gif" alt="warning-image"></div>
            <div style="font-size:22px; font-weight:700">Are you sure to log-out?</div>
            <div style="font-weight: 600; font-size:14px">Please, confirm your log-out action</div>
            <div>
                <button onclick="logOut();">YES</button>
                <button class="no-btn" onclick="alertClose();">NO</button>
            </div>
        </div>
    </div>
<?php } ?>