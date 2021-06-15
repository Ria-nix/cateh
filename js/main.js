if($(window).width() > 1124){
    $(".panel_buttons").removeClass('none');
    $(".toggle_bar").addClass('none');
}
else{
    $(".panel_buttons").addClass('none');
    $(".toggle_bar").removeClass('none');
}
console.log($(window).width());