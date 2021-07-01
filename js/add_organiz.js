var summ = 1, inputs;
$('#add_adress').click(function(){
    let adresses = document.querySelectorAll(".text_adress");
    for(var elem of adresses){
        if(elem.value == ''){ 
            elem.classList.add('red_auto');
            elem.setAttribute('placeholder','Введите адрес');    
            console.log('add adress')          
        }
    }
    elem.addEventListener('change', function(){
        if(elem.value == ''){ 
            elem.classList.add('red_auto');
            elem.setAttribute('placeholder','Введите адрес');    
            console.log('add adress')          
        }
        else{
            elem.classList.remove('red_auto');             
            elem.setAttribute('placeholder',''); 
        }
    })

    if(elem.value == ''){}
    else{summ >= 5 ? inputs = '' : addInput(); }
    
});

function addInput(){ 
    inputs = '<div class="cell"><input type="text" class="text_adress"><img src="icon/close.svg" alt="close"></div>';
    $('.fields_adress').append(inputs); 
    summ++;

    // remove the cell
    for(var elem of $('.cell').children('img')){ }
    elem.addEventListener('click', function(){ elem.parentElement.remove();  summ--});
    
}

    if($('.button_gray').val() == 0){
        console.log('none');
    }
    else{
        console.log($('#input_file').val());
    }


















