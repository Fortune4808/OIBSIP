function getPage(page) {
    $('#main').html('<div class="ajax-loader"><br><img src="./all-images/image-pix/ajax-loader.gif"/></div>').fadeIn(500);
    const formData = { action: 'get_form', page: page };
    $.ajax({
        url: adminLocalurl,
        type: 'POST',
        data: formData,
        success: function (response) {
            $('#main').html(response);
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
            url: endPoint + '/user/auth/reset-password/reset-password',
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

        if ($titleName.length && $fullName.length && $button.length) {
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
            url: endPoint + '/user/auth/reset-password/finish-reset-password',
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
            url: endPoint + '/user/auth/reset-password/resend-reset-pass-otp',
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

