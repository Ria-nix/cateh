//Open the modal window
$('#add_button').click(function(){ 
    let info = document.querySelectorAll(".add_info");
    for(var item_info of info){  
        // console.log(item_info.value);
        if(item_info.value == ''){ RedAuto(item_info); } 
    }
    item_info.addEventListener('change', function(){
        if(item_info.value == ''){ RedAuto(item_info); } 
        else{
            item_info.classList.remove('red_auto');
            item_info.setAttribute('placeholder','');
        }
    });
    if(item_info.value == ''){ console.log('none') }
    else{
        item_info.classList.remove('red_auto');
        item_info.setAttribute('placeholder','');
        $('.modal_window').removeClass('none');
    } 
});

function RedAuto(item_info){
    item_info.classList.add('red_auto');
    item_info.setAttribute('placeholder','Введите адрес'); 
}

// Close the modal window
$('.close_button').click(function(){ 
    $('.modal_window').addClass('none');
});

// The output of data on the server to Lera or Artemy
$('.add_button').click(function(){
    // let adress_all = document.querySelectorAll(".text_adress"); 
    // for(let none of adress_all){  
    //     console.log(none.value);  
    // }
    // if(address_all.value != ''){  }
    // else{  }
               
});

