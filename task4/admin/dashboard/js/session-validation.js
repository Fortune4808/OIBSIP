function sessionValidation() {
    if (!accessKey) {
      sessionStorage.clear();
      window.location.href = `${websiteUrl}/admin`;
    } 
}

function logOut(){
    sessionStorage.clear();
    window.location.href = `${websiteUrl}/admin`;
}
  