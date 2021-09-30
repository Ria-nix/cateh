function goToEditProfile(profile_id) {
    window.open("https://" + window.location.hostname + "/sysadmins/edit?id=" + profile_id, '_self').focus();
}

function deleteProfile(profile_id) {
    alert("пока не работает ^_^")
}

