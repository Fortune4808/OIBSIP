function getPage(page) {
    $('#main-dashboard').html('<div class="ajax-loader"><br><img src="./all-images/image-pix/ajax-loader.gif"/></div>').fadeIn(500);
    const formData = { action: 'get_page', page: page };
    $.ajax({
        url: adminDashboardLocalurl,
        type: 'POST',
        data: formData,
        success: function (response) {
            $('#main-dashboard').html(response);
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

