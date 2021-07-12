(function transitionMenu(){
    for(let elem of $('.admin')){
        elem.addEventListener('click',function(){
            window.location.href = 'sysadmin.php';})
    }
    
    for(let elem of $('.admin_plus')){
        elem.addEventListener('click',function(){
            window.location.href = 'add_sysadmin.php'; })
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



(function toggleButton(){
    let button = false;
    $('.toggle_but').click(function(){
        if(!button){
            $('.toggle_menu_fon').removeClass('none').addClass('grid');
            $('.toggle_but').addClass('close');
            $('body').addClass('scroll_none');
            $('#arrow').addClass('opacity_none');
            button = true;
        }
        else{
            $('.toggle_menu_fon').removeClass('grid').addClass('none');
            $('.toggle_but').removeClass('close');
            $('body').removeClass('scroll_none');
            $('#arrow').removeClass('opacity_none');
            button = false;
        }    
    });
}());

// Edit images on all pages

$('#input_file').on('change',function(ev){    
    var f = ev.target.files[0];
    var fr = new FileReader();
    
    fr.onload = function(ev2) {
        console.log(ev2);
        $('.logo').attr('src', ev2.target.result);
    };
    console.log(f + " " + fr);
    fr.readAsDataURL(f);

    console.log($('#input_file').val());
    
})
