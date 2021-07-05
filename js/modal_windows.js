//Open the modal window
$('#add_button').click(function(){ 
    $('.modal_window').removeClass('none'); 
});

// Close the modal window
$('.close').click(function(){ 
    $('.modal_window').addClass('none');
});

// The output of data on the server to Lera
$('.add_info').click(function(){
        let adress_all = document.querySelectorAll(".text_adress");    
        for(let none of adress_all){  
            console.log(none.value);  
        }       
});

