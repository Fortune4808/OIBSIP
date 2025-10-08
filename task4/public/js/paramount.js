function _showModal(props) {
    const {
        variant = "info",  // info | warning | success | failure
        title = "",
        description = "",
        falseBtn = false,
        falseBtnText = 'No',
        trueBtnText = 'Yes',
        trueBtnOnClick = () => { },
    } = props;

    $("#modalFrame").html("").fadeIn(1000);

    let icon = `<img src="${websiteUrl}/public/all-images/image-pix/info.gif" alt="warning gif">`;
    if (variant === 'warning') {
        icon = `<img src="${websiteUrl}/public/all-images/image-pix/warning.gif" alt="warning gif">`;
    } else if (variant === 'success') {
        icon = `<img src="${websiteUrl}/public/all-images/image-pix/success.gif" alt="warning gif">`;
    } else if (variant === 'failure') {
        icon = `<img src="${websiteUrl}/public/all-images/image-pix/warning.gif" alt="warning gif">`;
    }

    let content = `

    <div class="modal zoomIn animated">
        <div class="icon-div">${icon}</div>
        <div style="font-size:22px; font-weight:700">${title}</div>
        <div style="font-weight: 600; font-size:14px">${description}</div>
        <div>
            ${falseBtn ? (`<button class="no-btn" onclick="_closeModal();">${falseBtnText}</button>`) : ""}  
            <button onclick="${trueBtnOnClick}">${trueBtnText}</button>
        </div>
    </div>
  `;

    $("#modalFrame").html(content);
}

function _closeModal() {
    $("#modalFrame").html("").fadeOut(1000);
}

function _logoutModal() {
    _showModal({
        variant: 'warning',
        title: 'Are you sure to log-out?',
        description: 'Please, confirm your log-out action',
        falseBtn: true,
        falseBtnText: 'No, Stay Logged In',
        trueBtnText: 'Yes, Logout',
        trueBtnOnClick: 'logOut()'
    })
}

function _successModal() {
    _showModal({
        variant: 'success',
        title: 'Success',
        description: 'Your operation was completed successfully!',
        trueBtnText: 'Okay',
        trueBtnOnClick: '_closeModal()'
    })
}

