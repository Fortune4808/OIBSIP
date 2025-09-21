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
                        <img src="../../public/all-images/logo-pix/avatar.jpg" alt="">
                    </div>
                    <div>
                        <strong id="fullname" style="font-size: 30px; white-space: nowrap;">Fortune Tech Global</strong>
                        <div style="display: flex; gap:5px; color:#333;"><span id="status" style="background-color: var(--active-color); color:#fff; font-size:8px; padding:3px 5px; border-radius:50px; font-weight:700">ACTIVE</span><span style="font-size: 10px;"> | LAST LOGIN DATE:</span><span id="" style="font-style: italic; font-weight:600; font-size:10px">2025-06-01 10:53:35</span></div>
                    </div>
                </div>
                <div style="padding-top: 20px; padding-bottom:20px;">
                    <div class="border">BASIC INFORMATION</div>
                    <div class="form-container">
                        <div class="form">
                            <label for="Title"><i class="bi bi-people-fill"></i> Title</label>
                            <select id="" class="text-field">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form">
                            <label for="Email Address"><i class="bi bi-person-circle"></i> First Name</label>
                            <input type="text" class="text-field" placeholder="Enter your First Name">
                        </div>
                        <div class="form">
                            <label for="Email Address"><i class="bi bi-person-circle"></i> Middle Name</label>
                            <input type="text" class="text-field" placeholder="Enter your Middle Name">
                        </div>
                        <div class="form">
                            <label for="Email Address"><i class="bi bi-person-circle"></i> Last Name</label>
                            <input type="text" class="text-field" placeholder="Enter your Last Name">
                        </div>
                        <div class="form">
                            <label for="Home Address"><i class="bi bi-geo-alt-fill"></i> Home Address</label>
                            <input type="text" class="text-field" placeholder="Enter your Home Address">
                        </div>
                    </div>
                    <div class="border">CONTACT INFORMATION</div>
                    <div class="form-container">
                        <div class="form">
                            <label for="Phone Number"><i class="bi bi-telephone-forward-fill"></i> Phone Number</label>
                            <input type="text" class="text-field" placeholder="Enter your Phone Number">
                        </div>
                        <div class="form">
                            <label for="Email Address"><i class="bi bi-envelope-fill"></i> Email Address</label>
                            <input type="text" class="text-field" placeholder="Enter your Email Address">
                        </div>
                    </div>
                    <div class="border">ACCOUNT INFORMATION</div>
                    <div class="form-container">
                        <div class="form">
                            <label for="Registration ID"><i class="bi bi-person-badge-fill"></i> Registration ID</label>
                            <input type="text" class="text-field" placeholder="" readonly>
                        </div>
                        <div class="form">
                            <label for="Registration Date"><i class="bi bi-alarm-fill"></i> Registration Date</label>
                            <input type="text" class="text-field" placeholder="" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>