function goToEditProfile(profile_id) {
    window.open("https://" + window.location.hostname + "/sysadmins/profile/edit?id=" + profile_id, '_self').focus();
}

function deleteProfile(profile_id) {
    alert("пока не работает ^_^")
}

function goToOrganisationProfile(profile_id) {
    window.open("https://" + window.location.hostname + "/organisations/profile?id=" + profile_id, '_self').focus();
    return true;
}

