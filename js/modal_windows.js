//Open the modal window
$('#add_button').click(function(){ 
    let adress_all = document.querySelectorAll(".add_info"); 
    for(var none of adress_all){  
        console.log(none.value);
        if(none.value == ''){   
            none.classList.add('red_auto');
            none.setAttribute('placeholder','Введите номер');
        } 
        none.addEventListener('change', function(){
            if(none.value == ''){   
                none.classList.add('red_auto');
                none.setAttribute('placeholder','Введите номер');
            } 
            else{
                none.classList.remove('red_auto');
                none.setAttribute('placeholder','');
            }
        });
    }
    if(none.value == ''){console.log('none'); }
    else{
        $('.modal_window').removeClass('none');
        console.log('right');
    }


     
});

// Close the modal window
$('.close').click(function(){ 
    $('.modal_window').addClass('none');
});

// The output of data on the server to Lera
$('.add_info').click(function(){
    // let adress_all = document.querySelectorAll(".text_adress"); 
    // for(let none of adress_all){  
    //     console.log(none.value);  
    // }
    // if(address_all.value != ''){  }
    // else{  }
               
});

