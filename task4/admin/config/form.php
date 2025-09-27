<?php if ($page == 'log-in') { ?>
    <div class="fadeIn animated">
        <h1>👋 Hi, Welcome Back!</h1>
        <p>Kindly, provide the required information to sign-up on this platform. </p>

        <div class="form-div">
            <div class="form">
                <label for="Email Address"><i class="bi bi-envelope-fill"></i> Email Address</label>
                <input type="email" class="text-field" placeholder="Enter your Email Address" id="emailAddress">
            </div>
            <div class="form">
                <label for="Password"><i class="bi bi-lock-fill"></i> Password</label>
                <input type="password" class="text-field" placeholder="Enter your Password" id="password">
            </div>

            <div class="action">
                <button onclick="logIn();" title="Login" id="login">Login <i class="bi bi-check"></i></button>
                <div class="forget-pass" onclick="getPage('reset-password')">Forgot Password?</div>
            </div>
            <div class="signup-div">Don't have an account? <span onclick="getPage('signup')">Sign-Up</span></div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'reset-password') { ?>
    <div class="fadeIn animated">
        <h2>Reset Password</h2>
        <p>Kindly, provide your <span>Email Address</span> to reset your password </p>

        <div class="form-div">
            <div class="form">
                <label for="Email Address"><i class="bi bi-envelope-fill"></i> Email Address</label>
                <input type="email" class="text-field" placeholder="Enter your Email Address" id="emailAddress">
            </div>

            <div class="action">
                <button title="Proceed" onclick="resetPassword();" id="submit-btn">Proceed <i class="bi bi-arrow-right"></i></button>
                <div>Existing User? <span class="forget-pass" onclick="getPage('log-in')">Login here</span></div>
            </div>
            <div class="signup-div">Don't have an account? <span onclick="getPage('signup')">Sign-Up</span></div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'signup') { ?>
    <div class="fadeIn animated">
        <h2>New Registration</h2>
        <p>Kindly, provide the required information to sign-up on this platform.</p>

        <div class="form-div">
            <div class="form">
                <label for="Title"><i class="bi bi-people-fill"></i> Title</label>
                <select id="titleId" class="text-field">
                    <option value="">Select Title</option>
                    <script>fetchTitle();</script>
                </select>
            </div>
            <div class="form">
                <label for="First Name"><i class="bi bi-person-circle"></i> First Name</label>
                <input type="text" class="text-field" placeholder="Enter your First Name" id="firstName">
            </div>
            <div class="form">
                <label for="Middle Name"><i class="bi bi-person-circle"></i> Middle Name</label>
                <input type="text" class="text-field" placeholder="Enter your Middle Name" id="middleName">
            </div>
            <div class="form">
                <label for="Last Name"><i class="bi bi-person-circle"></i> Last Name</label>
                <input type="text" class="text-field" placeholder="Enter your Last Name" id="lastName">
            </div>
            <div class="form">
                <label for="Email Address"><i class="bi bi-envelope-fill"></i> Email Address</label>
                <input type="email" class="text-field" placeholder="Enter your Email Address" id="emailAddress">
            </div>
            <div class="form">
                <label for="Phone Number"><i class="bi bi-telephone-fill"></i> Phone Number</label>
                <input type="text" class="text-field" placeholder="Enter your Phone Number" id="phoneNumber">
            </div>
            <div class="form">
                <label for="Home Address"><i class="bi bi-geo-alt-fill"></i> Home Address</label>
                <input type="text" class="text-field" placeholder="Enter your Home Address" id="homeAddress">
            </div>
             <div class="form">
                <label for="Password"><i class="bi bi-lock-fill"></i> Password</label>
                <input type="password" class="text-field" placeholder="Enter your Password" id="password">
            </div>
             <div class="form">
                <label for="Confirmed Password"><i class="bi bi-lock-fill"></i> Confirmed Password</label>
                <input type="password" class="text-field" placeholder="Enter Confirmed Password" id="confirmedPassword">
            </div>

            <div class="action">
                <button title="sign up" onclick="newRegistration();" id="submit">Sign Up <i class="bi bi-check"></i></button>
            </div>
            <div class="signup-div">Already have an account? <span onclick="getPage('log-in')">Login</span></div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'proceed-to-reset-pass') { ?>
    <div class="fadeIn animated">
        <h2>Complete Reset Password</h2>
        <p>Hi, <span id="title"></span> <span id="fullname"></span>, an <span>OTP</span> has been sent to your email address (<span id="email"></span>)</p>

        <div class="form-div">
            <div class="form">
                <label for="Enter OTP"><i class="bi bi-shield-lock-fill"></i> Enter OTP</label>
                <input type="text" class="text-field" placeholder="Enter OTP" id="otp">
            </div>
            <div class="form">
                <label for="Enter New Password"><i class="bi bi-person-fill-lock"></i> Enter New Password</label>
                <input type="password" class="text-field" placeholder="Enter New Password" id="password">
            </div>
            <div class="form">
                <label for="Enter Confirmed Password"><i class="bi bi-person-fill-lock"></i> Enter Confirmed Password</label>
                <input type="password" class="text-field" placeholder="Enter Confirmed Password" id="confirmed-password">
            </div>
            <div class="signup-div">OTP Not Received Yet? <span id="resend-otp">Resend OTP</span></div>

            <div class="action">
                <button title="submit" id="finish-reset-pass">Submit <i class="bi bi-check"></i></button>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'email-verification-reg') { ?>
    <div class="fadeIn animated">
        <h2>Complete Registration</h2>
        <p>An <span>OTP</span> has been sent to your email address (<span id="email"></span>) to verify your email address</p>

        <div class="form-div">
            <div class="form">
                <label for="Enter OTP"><i class="bi bi-shield-lock-fill"></i> Enter OTP</label>
                <input type="text" class="text-field" placeholder="Enter OTP" id="otp">
            </div>
            <div class="signup-div">OTP Not Received Yet? <span id="resend-otp">Resend OTP</span></div>

            <div class="action">
                <button title="Proceed" id="finish-reg">SUBMIT <i class="bi bi-check"></i></button>
            </div>
        </div>
    </div>
<?php } ?>