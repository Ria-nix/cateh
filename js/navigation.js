$(document).ready(function(){
    
    (function transitionMenu(){
        for(let elem of $('.admin')){
            elem.addEventListener('click',function(){
            window.location.href = 'sysadmin.php';});
        }
        
        for(let elem of $('.admin_plus')){
            elem.addEventListener('click',function(){
            window.location.href = 'add_sysadmin.php'; });
        }
        
        for(let elem of $('.organization')){
            elem.addEventListener('click',function(){
            window.location.href = 'organization.php'; });
        }
        
        for(let elem of $('.organization_plus')){
            elem.addEventListener('click',function(){
            window.location.href = 'add_organization.php'; });
        }
        
        for(let elem of $('.settings')){
            elem.addEventListener('click',function(){
            window.location.href = 'settings.php'; });
        }
        
        for(let elem of $('.exit')){
            elem.addEventListener('click',function(){
            window.location.href = 'order.php'; });
        }
    }());
    $('#main_logo_navigation').click(function(){
        window.location.href = 'sysadmin.php';
    })
    
    (function toggleButton(){
        let button = false;
        $('.toggle_but').click(function(){
            if(!button){
                $('.toggle_menu_fon').removeClass('none').addClass('grid');
                $('.toggle_but').addClass('close');
                $('body').addClass('scroll_none');
                $('#arrow').addClass('opacity_none');
                $('.head_table').addClass('none');
                button = true;
            }
            else{
                $('.toggle_menu_fon').removeClass('grid').addClass('none');
                $('.toggle_but').removeClass('close');
                $('body').removeClass('scroll_none');
                $('#arrow').removeClass('opacity_none');
                $('.head_table').removeClass('none');
                button = false;
            }    
        });
    }());
    

    // Edit images on all pages
    $('#input_file').on('change',function(ev){    
        var f = ev.target.files[0];
        var fr = new FileReader();    
        fr.onload = function(ev2) { $('.logo_second').attr('src', ev2.target.result); };
        fr.readAsDataURL(f);    
    })

    let logo_organ = document.querySelector('.logo_second');
    $('#delete_admin').click(function(){
        logo_organ.src = 'icon/anonym_user.svg';
    })
    $('#delete_organ').click(function(){
        logo_organ.src = 'icon/anonym_organization.svg';
    })
    $('#delete_settings').click(function(){
        logo_organ.src = 'icon/logo_server.svg';
    })
    
    
})
