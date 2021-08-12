var summ_address = 1, inputs;
$('#add_address').click(function(){
    let adresses = document.querySelectorAll(".text_address");
    for(var elem of adresses){
        if(elem.value == ''){RedAuto(elem)}
    }
    elem.addEventListener('change', function(){
        if(elem.value == ''){ RedAuto(elem); }
        else{
            elem.classList.remove('red_auto');             
            elem.setAttribute('placeholder',''); 
        }
    })
    if(elem.value != ''){ summ_address >= 23 ? inputs = '' : addInput();  }    
});

function addInput(){ 
    inputs = '<div class="cell"><input type="text" class="text_address add_info "><img src="icon/close.svg" alt="close"></div>';
    document.documentElement.scrollWidth <= 620 ? $('.mobile_fields_address').append(inputs) : $('.fields_address').append(inputs);      
    summ_address++;

    // remove the cell
    for(var item_new of $('.cell').children('img')){ }
    item_new.addEventListener('click', function(){ item_new.parentElement.remove();  summ_address--});    
}

function RedAuto(elem){
    let text = elem.classList.contains('text_address') ? 'Введите адрес' : 'Заполните или удалите поле' ; 
    elem.classList.add('red_auto');
    elem.setAttribute('placeholder', text); 
}

// let 
// if()
