function getPage(page) {
    const container = $('#main-dashboard');
    container.html(`<div class="ajax-loader"><br><img src="../../public/all-images/image-pix/ajax-loader.gif"/></div>`).fadeIn(1000);
    const formData = { action: 'get_page', page: page };
    $.ajax({
        url: adminDashboardLocalurl,
        type: 'POST',
        data: formData,
        success: function (response) {
            (container).html(response);
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
    const container = $('#overlay');
    container.html(`<div class="ajax-loader"><br><img src="../../public/all-images/image-pix/ajax-loader.gif"/></div>`).fadeIn(1000);
    const formData = { action: 'get_form', page: page };
    $.ajax({
        url: adminDashboardLocalurl,
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

function alertClose() {
    $('#overlay').html('').fadeOut(1000);
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
                        $("#pictureBox1, #pictureBox2, #pictureBox3").attr('src', `${data.documentStoragePath}/${fetchProfile.passport}`);
                    }
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

function getAllUsers(page = 1) {
    const container = $('#get-all-users');
    container.html(`<div class="ajax-loader"><br><img src="../../public/all-images/image-pix/ajax-loader.gif"/></div>`).fadeIn(500);
    try {
        $.ajax({
            type: "GET",
            url: `${endPoint}/user/fetch-all-users?page=${page}`,
            cache: false,
            headers: {
                "apiKey": apiKey,
                "Authorization": "Bearer " + accessKey
            },
            success: function (data) {
                const { success, message, check, pagination } = data;
                if (success) {
                    const fetchProfile = data.profiles;
                    if (fetchProfile.length > 0) {
                        const tableRows = fetchProfile.map((item, index) => {
                            const userId = item.userId;
                            const fullName = `${item.title.titleName} ${item.firstName} ${item.middleName} ${item.lastName}`;
                            const emailAddress = item.emailAddress;
                            const phoneNumber = item.phoneNumber;
                            const statusName = item.status.statusName;
                            const statusId = item.status.statusId;
                            const lastLogin = item.lastLogin == null ? 'N/A' : item.lastLogin;
                            const passportUrl = `${data.documentStoragePath}/${item.passport}`;

                            return `
                        <tr>
                            <td>${index + 1}</td>
                            <td>
                                <div class="userprofile">
                                    <div class="passport">
                                        <img src="${passportUrl}" alt="passport" />
                                    </div>
                                    <div>
                                        <div style="font-weight:700;">${fullName}</div>
                                        <div>${userId}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="userprofile">
                                    <div>
                                        <div>${emailAddress}</div>
                                        <div>${phoneNumber}</div>
                                    </div>
                                </div>
                            </td>
                            <td>${lastLogin}</td>
                            <td>
                                <span class="${statusId == 1 ? 'status activestatus' : 'status inactivestatus'}">
                                    ${statusName}
                                </span>
                            </td>
                            <td><button class="status view" title="view" onclick="getStaffProfile('${userId}');">VIEW</button></td>
                        </tr>
                    `;
                        }).join('');

                        const table = `
                    <table>
                        <thead><tr><th>SN</th><th>User Name</th><th>Contact</th><th>Last Login</th><th>Status</th><th>View</th></tr></thead>
                        <tbody>${tableRows}</tbody>
                    </table>
                    <div class="pagination">
                        <div>
                            Showing ${pagination.currentPage} to ${pagination.totalPages} of ${pagination.totalUser} entries
                        </div>

                        <div>
                            <button class="paginate-btn" title="Previous" ${pagination.prevPage ? `onclick="getAllUsers(${pagination.prevPage})"` : 'disabled'}>PREVIOUS</button>
                            <button class="paginate-btn" title="Next" ${pagination.nextPage ? `onclick="getAllUsers(${pagination.nextPage})"` : 'disabled'}>NEXT</button>
                        </div>
                    </div>
                `;
                        container.html(table);
                    }
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

function getStaffProfile(userId) {
    getForm('staffProfile');
    try {
        $.ajax({
            type: "GET",
            url: `${endPoint}/user/fetch-all-users?userId=${userId}`,
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
                        $('#profile-fullname').html(capitalizeWords(fullName));
                        $('#status').html(`<span style="background-color:${fetchProfile.status.statusId == 1 ? 'var(--active-color)' : 'var(--inactive-color)'};color:#fff;font-size:8px;padding:3px 5px;border-radius:50px;font-weight:700;">${fetchProfile.status.statusName}</span>`);
                        $('#titleId').append(`<option value="${fetchProfile.title.titleId}">${fetchProfile.title.titleName}</option>`);
                        $('#lastLogin').html(fetchProfile.lastLogin == null ? 'N/A' : fetchProfile.lastLogin);
                        $('#firstName').val(fetchProfile.firstName);
                        $('#middleName').val(fetchProfile.middleName);
                        $('#lastName').val(fetchProfile.lastName);
                        $('#homeAddress').val(fetchProfile.homeAddress);
                        $('#phoneNumber').val(fetchProfile.phoneNumber);
                        $('#emailAddress').val(fetchProfile.emailAddress);
                        $('#registrationId').val(fetchProfile.userId);
                        $('#registrationDate').val(fetchProfile.createdTime);
                        $("#passport").attr('src', `${data.documentStoragePath}/${fetchProfile.passport}`);
                    }
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

