(function transitionMenu(){
    for(let elem of $('.admin')){
        elem.addEventListener('click',function(){
            window.location.href = 'sysadmin.php';})
    }
    
    for(let elem of $('.admin_plus')){
        elem.addEventListener('click',function(){
            window.location.href = '#'; })
    }
    
    for(let elem of $('.organization')){
        elem.addEventListener('click',function(){
            window.location.href = 'organization.php'; })
    }
    
    for(let elem of $('.organization_plus')){
        elem.addEventListener('click',function(){
            window.location.href = 'add_organization.php'; })
    }
    
    for(let elem of $('.settings')){
        elem.addEventListener('click',function(){
            window.location.href = 'settings.php'; })
    }
    
    for(let elem of $('.exit')){
        elem.addEventListener('click',function(){
            window.location.href = '#'; })
    }
}());



function toggleButton(){
    let button = false;
    $('.toggle_but').click(function(){
        if(!button){
            $('.toggle_menu_fon').removeClass('none').addClass('grid');
            $('.toggle_but').addClass('close');
            button = true;
        }
        else{
            $('.toggle_menu_fon').removeClass('grid').addClass('none');
            $('.toggle_but').removeClass('close');
            button = false;
        }    
    });
}
toggleButton();

