let button = false;

$('.toggle_but').click(function(){
    if(!button){
        $('.toggle_menu_fon').removeClass('none').addClass('grid');
        $('.toggle_but').addClass('close');
        console.log('click')
    }
    else{
        $('.toggle_menu_fon').addClass('none').remove('grid');
        $('.toggle_but').removeClass('close');
        console.log('click2')
    }
    
});
