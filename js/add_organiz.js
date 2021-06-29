let summ = 1, inputs;
$('#add_adress').click(function(){
    if($('#adress').val() == ''){ 
        $('#adress').addClass('red_auto');
        $('#adress').attr('placeholder','Введите адрес для добавления еще одного ');         
    }
    else{
        $('#adress').removeClass('red_auto'); 
        if(summ == 23){ inputs = ''; }
        else{
            inputs = '<div class="cell"><input type="text" class="text_adress"><img src="icon/close.svg" alt="close"></div>';
            $('.fields_adress').append(inputs);    
            summ++; 

            for(var elem of $('.cell').children('img')){ }
            elem.addEventListener('click', function(){ elem.parentElement.remove();  summ--});
        }

        // if($('.field_adress').last('.text_adress').val() == ''){
        //     $('#adress').addClass('red_auto');
        //     $('#adress').attr('placeholder','Введите адрес для добавления еще одного ');
        // }
        // else{
                    
            
        // }
        
    }
})

$('#adress').change(function(){
    $('#adress').attr('placeholder','');
    $('#adress').removeClass('red_auto');
})

