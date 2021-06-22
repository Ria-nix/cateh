switch(this){
    case $(this).hasClass('admin'):
        window.location.href = 'sysadmin.php';   
        break;

    case $(this).hasClass('admin_plus'):
        window.location.href = '#';   
        break;

    case $(this).hasClass('organization'):
        window.location.href = 'organization.php';   
        break;

    case $(this).hasClass('organization_plus'):
        window.location.href = 'organization_plus.php';   
        break;

    case $(this).hasClass('settings'):
        window.location.href = 'settings.php';   
        break;

    case $(this).hasClass('exit'):
        window.location.href = 'exit.php';   
        break;

    default:
        alert('error');
        break;
}