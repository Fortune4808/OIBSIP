function getPage(page) {
    $('#main-dashboard').html('<div class="ajax-loader"><br><img src="./all-images/image-pix/ajax-loader.gif"/></div>').fadeIn(500);
    const formData = { action: 'get_page', page: page };
    $.ajax({
        url: adminDashboardLocalurl,
        type: 'POST',
        data: formData,
        success: function (response) {
            $('#main-dashboard').html(response);
            $('.side-nav li').removeClass('active');
            $('#nav-' + page).addClass('active');

            $('header li').removeClass('active');
            $('#header-' + page).addClass('active');
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + ' - ' + error);
        }
    });
}

function getForm(page) {
    $('#overlay').html('<div class="ajax-loader"><br><img src="./all-images/image-pix/ajax-loader.gif"/></div>').fadeIn(500);
    const formData = { action: 'get_form', page: page };
    $.ajax({
        url: adminDashboardLocalurl,
        type: 'POST',
        data: formData,
        success: function (response) {
            $('#overlay').html(response);
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error: ' + status + ' - ' + error);
        }
    });
}

function alertClose() {
    $('#overlay').html('').fadeOut(200);
}

function capitalizeWords(str) {
    return str.toLowerCase().replace(/\b\w/g, char => char.toUpperCase());
}

function getAuthProfile() {
    try {
        $.ajax({
            type: "GET",
            url: `${endPoint}/user/auth/profile`,
            cache: false,
            headers: {
                "apiKey": apiKey,
                "Authorization": "Bearer " + accessKey
            },
            success: function (data) {
                const { success, check } = data;
                if (success) {
                    if (check) {
                        const fetchProfile = data.profile;
                        const fullName = `${fetchProfile.title.titleName} ${fetchProfile.firstName} ${fetchProfile.middleName} ${fetchProfile.lastName}`;
                        $('#profile-name, #fullname, #profile-fullname').html(capitalizeWords(fullName));
                        $('#status-name').html(capitalizeWords(fetchProfile.status.statusName));
                        $('#status').html(`<span style="background-color:${fetchProfile.status.statusId == 1 ? 'var(--active-color)' : 'var(--inactive-color)'};color:#fff;font-size:8px;padding:3px 5px;border-radius:50px;font-weight:700;">${fetchProfile.status.statusName}</span>`);
                        $('#titleId').append(`<option value="${fetchProfile.title.titleId}">${fetchProfile.title.titleName}</option>`);
                        $('#lastLogin').html(fetchProfile.lastLogin);
                        $('#firstName').val(fetchProfile.firstName);
                        $('#middleName').val(fetchProfile.middleName);
                        $('#lastName').val(fetchProfile.lastName);
                        $('#homeAddress').val(fetchProfile.homeAddress);
                        $('#phoneNumber').val(fetchProfile.phoneNumber);
                        $('#emailAddress').val(fetchProfile.emailAddress);
                        $('#registrationId').val(fetchProfile.userId);
                        $('#registrationDate').val(fetchProfile.createdTime);
                    }
                } else {
                    logOut();
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

