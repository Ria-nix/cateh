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
