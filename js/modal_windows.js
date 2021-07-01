//Open the modal window
$('#add_button').click(function(){ 
    $('.modal_window').removeClass('none'); 
    $('body').addClass('scroll_none');
});

// Close the modal window
$('.close').click(function(){ 
    $('.modal_window').addClass('none');
    $('body').removeClass('scroll_none'); 
});

// Close the modal window
$('.add_info').click(function(){
        let adress_all = document.querySelectorAll(".text_adress");    
        for(let none of adress_all){  
            console.log(none.value);  
        }       
});

