function getPage(page) {
    const container = $('#main');
    container.html('<div class="ajax-loader"><br><img src="../public/all-images/image-pix/ajax-loader.gif"/></div>').fadeIn(500);
    const formData = { action: 'get_form', page: page };
    $.ajax({
        url: adminLocalurl,
        type: 'POST',
        data: formData,
        success: function (response) {
            (container).html(response);
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + ' - ' + error);
        }
    });
}

function resetPassword() {
    try {
        const emailAddress = $('#emailAddress').val();

        if (!emailAddress) {
            alert('Email Address is Required to Continue!');
            return
        }

        const btnText = $('#submit-btn').html();
        $('#submit-btn').html('<i id="spinner" class="bi bi-arrow-repeat"></i> PROCESSING...');
        document.getElementById('submit-btn').disabled = true;

        const formData = new FormData();
        formData.append("emailAddress", emailAddress);

        $.ajax({
            type: "POST",
            url: `${endPoint}/user/auth/reset-password/reset-password`,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            headers: {
                "apiKey": apiKey
            },
            success: function (data) {
                const { success, message } = data;

                if (success) {
                    const fetch = data.data
                    const userId = fetch.userId;
                    const titleName = fetch.title.titleName;
                    const firstName = fetch.firstName;
                    const middleName = fetch.middleName;
                    const lastName = fetch.lastName;
                    const emailAddress = fetch.emailAddress;
                    alert(message);
                    getResetpasswordForm({ userId, titleName, firstName, middleName, lastName, emailAddress });
                } else {
                    alert(message);
                }
            },
            error: function (xhr) {
                alert("Request failed");
            }
        })
            .always(function () {
                $('#submit-btn').html(btnText);
                document.getElementById('submit-btn').disabled = false;
            });
    } catch (error) {
        alert(error);
    }
}

function getResetpasswordForm({ userId, titleName, firstName, middleName, lastName, emailAddress }) {
    getPage('proceed-to-reset-pass');

    const interval = setInterval(() => {
        const $titleName = $('#title');
        const $fullName = $('#fullname');
        const $emailAddress = $('#email');
        const $button = $('#finish-reset-pass');
        const $resendOTP = $('#resend-otp');

        if ($titleName.length && $fullName.length && $emailAddress && $button.length) {
            $titleName.html(titleName);
            const fullName = `${firstName} ${middleName} ${lastName}`
            $fullName.html(fullName);
            $emailAddress.html(emailAddress);
            $button.off("click").on("click", () => finishResetPassword(userId));
            $resendOTP.off("click").on("click", () => resendOTP(userId));
            clearInterval(interval);
        }
    }, 50);
}

function finishResetPassword(userId) {
    const otp = $('#otp').val()
    const password = $('#password').val()
    const confirmedPassword = $('#confirmed-password').val()

    if (!otp) {
        alert('ERROR! Enter OTP to Continue');
        return;
    }
    if (!password) {
        alert('ERROR! Enter Password to Continue');
        return;
    }
    if (!confirmedPassword) {
        alert('ERROR! Enter Confirmed Password to Continue');
        return;
    }
    if (password != confirmedPassword) {
        alert('ERROR! Password and Confirmed Password dont Match');
        return;
    }

    try {

        const btnText = $('#finish-reset-pass').html();
        $('#finish-reset-pass').html('<i id="spinner" class="bi bi-arrow-repeat"></i> SUBMITTING...');
        document.getElementById('finish-reset-pass').disabled = true;

        const formData = new FormData();
        formData.append("otp", otp);
        formData.append("password", password);
        formData.append("confirmedPassword", confirmedPassword);
        formData.append("userId", userId);

        $.ajax({
            type: "POST",
            url: `${endPoint}/user/auth/reset-password/finish-reset-password`,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            headers: {
                "apiKey": apiKey
            },
            success: function (data) {
                const { success, message } = data;

                if (success) {
                    alert(message);
                    getPage('log-in');
                } else {
                    alert(message);
                }
            },
            error: function (xhr) {
                alert("Request failed");
            }
        })
            .always(function () {
                $('#finish-reset-pass').html(btnText);
                document.getElementById('finish-reset-pass').disabled = false;
            });
    } catch (error) {
        alert(error);
    }
}

function resendOTP(userId) {
    try {

        const btnText = $('#resend-otp').html();
        $('#resend-otp').html('<i id="spinner" class="bi bi-arrow-repeat"></i> RESENDING...');
        document.getElementById('resend-otp').disabled = true;

        const formData = new FormData();
        formData.append("userId", userId);

        $.ajax({
            type: "POST",
            url: `${endPoint}/user/auth/reset-password/resend-reset-pass-otp`,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            headers: {
                "apiKey": apiKey
            },
            success: function (data) {
                const { success, message } = data;

                if (success) {
                    alert(message);
                } else {
                    alert(message);
                }
            },
            error: function (xhr) {
                alert("Request failed");
            }
        })
            .always(function () {
                $('#resend-otp').html(btnText);
                document.getElementById('resend-otp').disabled = false;
            });
    } catch (error) {
        alert(error);
    }
}

function fetchTitle() {
    try {
        $.ajax({
            type: "GET",
            url: `${endPoint}/setup/title`,
            cache: false,
            headers: {
                "apiKey": apiKey
            },
            success: function (data) {
                const { success, data: titles } = data;

                if (success && titles.length > 0) {
                    let text = "";

                    for (let i = 0; i < titles.length; i++) {
                        const { titleId, titleName } = titles[i];
                        text += `<option value="${titleId}">${titleName}</option>`;
                    }

                    $('#titleId').append(text);
                }
            },
            error: function () {
                console.log("Request failed");
            }
        });
    } catch (error) {
        alert(error);
    }
}

function newRegistration() {
    const titleId = $('#titleId').val()
    const firstName = $('#firstName').val()
    const middleName = $('#middleName').val()
    const lastName = $('#lastName').val()
    const emailAddress = $('#emailAddress').val()
    const phoneNumber = $('#phoneNumber').val()
    const homeAddress = $('#homeAddress').val()
    const password = $('#password').val()
    const confirmedPassword = $('#confirmedPassword').val()

    if (!titleId) {
        alert('ERROR! Select Title to Continue');
        return;
    }
    if (!firstName) {
        alert('ERROR! Enter your First Name to Continue');
        return;
    }
    if (!middleName) {
        alert('ERROR! Enter your Middle Name to Continue');
        return;
    }
    if (!lastName) {
        alert('ERROR! Enter your Last Name to Continue');
        return;
    }
    if (!emailAddress) {
        alert('ERROR! Enter your Email Address to Continue');
        return;
    }
    if (!phoneNumber) {
        alert('ERROR! Enter your Phone Number to Continue');
        return;
    }
    if (!homeAddress) {
        alert('ERROR! Enter your Home Address to Continue');
        return;
    }
    if (!password) {
        alert('ERROR! Enter your Password to Continue');
        return;
    }
    if (!confirmedPassword) {
        alert('ERROR! Enter Confirmed Password to Continue');
        return;
    }
    if (password != confirmedPassword) {
        alert('ERROR! Password dont match with confirmed password');
        return;
    }

    try {

        const btnText = $('#submit').html();
        $('#submit').html('<i id="spinner" class="bi bi-arrow-repeat"></i> SUBMITTING...');
        document.getElementById('submit').disabled = true;

        const formData = new FormData();
        formData.append("titleId", titleId);
        formData.append("firstName", firstName);
        formData.append("middleName", middleName);
        formData.append("lastName", lastName);
        formData.append("emailAddress", emailAddress);
        formData.append("phoneNumber", phoneNumber);
        formData.append("homeAddress", homeAddress);
        formData.append("password", password);
        formData.append("confirmedPassword", confirmedPassword);

        $.ajax({
            type: "POST",
            url: `${endPoint}/user/auth/registration/registration`,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            headers: {
                "apiKey": apiKey
            },
            success: function (data) {
                const { success, message } = data;

                if (success) {
                    alert(message);
                    getRegVerificationForm({ emailAddress });
                } else {
                    alert(message);
                }
            },
            error: function (xhr) {
                alert("Request failed");
            }
        })
            .always(function () {
                $('#submit').html(btnText);
                document.getElementById('submit').disabled = false;
            });
    } catch (error) {
        alert(error);
    }
}

function getRegVerificationForm({ emailAddress }) {
    getPage('email-verification-reg');
    const interval = setInterval(() => {
        const $emailAddress = $('#email');
        const $button = $('#finish-reg');
        const $resendOTP = $('#resend-otp');

        if ($emailAddress.length && $button.length) {
            $emailAddress.html(emailAddress);
            $button.off("click").on("click", () => finishRegistration(emailAddress));
            $resendOTP.off("click").on("click", () => resendRegOTP(emailAddress));
            clearInterval(interval);
        }
    }, 50);
}

function finishRegistration(emailAddress) {
    const otp = $('#otp').val()

    if (!otp) {
        alert('ERROR! Enter OTP to Continue');
        return;
    }

    try {

        const btnText = $('#finish-reg').html();
        $('#finish-reg').html('<i id="spinner" class="bi bi-arrow-repeat"></i> SUBMITTING...');
        document.getElementById('finish-reg').disabled = true;

        const formData = new FormData();
        formData.append("emailAddress", emailAddress);
        formData.append("otp", otp);

        $.ajax({
            type: "POST",
            url: `${endPoint}/user/auth/registration/finish-registration`,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            headers: {
                "apiKey": apiKey
            },
            success: function (data) {
                const { success, message } = data;

                if (success) {
                    alert(message);
                    getPage('log-in');
                } else {
                    alert(message);
                }
            },
            error: function (xhr) {
                alert("Request failed");
            }
        })
            .always(function () {
                $('#finish-reg').html(btnText);
                document.getElementById('finish-reg').disabled = false;
            });
    } catch (error) {
        alert(error);
    }
}

function resendRegOTP(emailAddress) {
    try {

        const btnText = $('#resend-otp').html();
        $('#resend-otp').html('<i id="spinner" class="bi bi-arrow-repeat"></i> RESENDING...');
        document.getElementById('resend-otp').disabled = true;

        const formData = new FormData();
        formData.append("emailAddress", emailAddress);

        $.ajax({
            type: "POST",
            url: `${endPoint}/user/auth/registration/resend-reg-otp`,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            headers: {
                "apiKey": apiKey
            },
            success: function (data) {
                const { success, message } = data;

                if (success) {
                    alert(message);
                } else {
                    alert(message);
                }
            },
            error: function (xhr) {
                alert("Request failed");
            }
        })
            .always(function () {
                $('#resend-otp').html(btnText);
                document.getElementById('resend-otp').disabled = false;
            });
    } catch (error) {
        alert(error);
    }
}

function logIn() {
    const emailAddress = $('#emailAddress').val();
    const password = $('#password').val();

    if (!emailAddress) {
        alert('Enter your Email Address to Continue!');
        return
    }

    if (!password) {
        alert('Enter your Password to Continue!');
        return
    }

    const btnText = $('#login').html();
    $('#login').html('<i id="spinner" class="bi bi-arrow-repeat"></i> AUTHENTICATING...');
    document.getElementById('login').disabled = true;

    const formData = new FormData();
    formData.append("emailAddress", emailAddress);
    formData.append("password", password);

    try {

        $.ajax({
            type: "POST",
            url: `${endPoint}/user/auth/login`,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            headers: {
                "apiKey": apiKey
            },
            success: function (data) {
                const { success, message, accessKey } = data;

                if (success) {
                    // alert(message);
                    sessionStorage.setItem("accessKey", accessKey);
                    location.href = dashboardUrl;
                } else {
                    alert(message);
                }
            },
            error: function (xhr) {
                alert("Request failed");
            }
        })
            .always(function () {
                $('#login').html(btnText);
                document.getElementById('login').disabled = false;
            });
    } catch (error) {
        alert(error);
    }
}


