<?php if ($page == 'log-in') { ?>
    <div class="log-div" id="login">
        <h1>👋 Hi, Welcome Back!</h1>
        <p>Kindly, provide the required information to sign-up on this platform. </p>

        <div class="form-div">
            <div class="form">
                <label for="Email Address"><i class="bi bi-envelope-fill"></i> Email Address</label>
                <input type="text" class="text-field" placeholder="Enter your Email Address">
            </div>
            <div class="form">
                <label for="Password"><i class="bi bi-lock-fill"></i> Password</label>
                <input type="password" class="text-field" placeholder="Enter your Password">
            </div>

            <div class="action">
                <button title="Login">Login <i class="bi bi-check"></i></button>
                <div class="forget-pass" onclick="nextPage('reset-password')">Forgot Password?</div>
            </div>
            <div class="signup-div">Don't have an account? <span>Sign-Up</span></div>
        </div>
    </div>

    <div class="log-div" id="reset-password">
        <h2>Reset Password</h2>
        <p>Kindly, provide your <span>Email Address</span> to reset your password </p>

        <div class="form-div">
            <div class="form">
                <label for="Email Address"><i class="bi bi-envelope-fill"></i> Email Address</label>
                <input type="text" class="text-field" placeholder="Enter your Email Address">
            </div>

            <div class="action">
                <button title="Proceed">Proceed <i class="bi bi-arrow-right"></i></button>
                <div class="forget-pass">Forgot Password?</div>
            </div>
            <div class="signup-div">Don't have an account? <span onclick="nextPage('signup')">Sign-Up</span></div>
        </div>
    </div>

    <div class="log-div" id="signup">
        <h2>New Registration</h2>
        <p>Kindly, provide the required information to sign-up on this platform.</p>

        <div class="form-div">
            <div class="form">
                <label for="First Name"><i class="bi bi-person-circle"></i> First Name</label>
                <input type="text" class="text-field" placeholder="Enter your Email Address">
            </div>
            <div class="form">
                <label for="Email Address"><i class="bi bi-person-circle"></i> Middle Name</label>
                <input type="text" class="text-field" placeholder="Enter your Email Address">
            </div>
            <div class="form">
                <label for="Email Address"><i class="bi bi-person-circle"></i> Last Name</label>
                <input type="text" class="text-field" placeholder="Enter your Email Address">
            </div>
            <div class="form">
                <label for="Email Address"><i class="bi bi-envelope-fill"></i> Email Address</label>
                <input type="text" class="text-field" placeholder="Enter your Email Address">
            </div>
            <div class="form">
                <label for="Email Address"><i class="bi bi-telephone-fill"></i> Mobile Number</label>
                <input type="text" class="text-field" placeholder="Enter your Email Address">
            </div>
             <div class="form">
                <label for="Email Address"><i class="bi bi-envelope-fill"></i> Gender</label>
                <select id="" class="text-field">
                    <option value=""></option>
                </select>
            </div>

            <div class="action">
                <button title="sign up">Sign Up <i class="bi bi-check"></i></button>
            </div>
            <div class="signup-div">Already have an account? <span onclick="nextPage('login')">Login</span></div>
        </div>
    </div>
<?php } ?>