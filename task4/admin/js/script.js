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
                const success = data.success;

                if (success) {
                    const message = data.message;
                    const userId = data.userId;
                    // const titleName = data.title.titleName;
                    const firstName = data.firstName;
                    const middleName = data.middleName;
                    const lastName = data.lastName;
                    const emailAddress = data.emailAddress;
                    alert(message);
                    getResetpasswordForm(userId, firstName, middleName, lastName, emailAddress);
                } else {
                    alert('not susccess');
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

function getResetpasswordForm(userId, firstName, middleName, lastName, emailAddress) {
    getPage('signup');
    alert(firstName);
}