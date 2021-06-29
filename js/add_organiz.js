$('#add_adress').click(function(){
    if($('#adress').val() == ''){ 
        $('#adress').addClass('red_auto');
        $('#adress').attr('placeholder','Введите первый адрес для добавления еще одного ');
        console.log('stop'); 

    }
    else{
        if($('.field_adress').last('.text_adress').val() == ''){
            $('#adress').addClass('red_auto');
            $('#adress').attr('placeholder','Введите первый адрес для добавления еще одного ');
        }
        else{
            let inputs = '<div class="cell"><input type="text" class="text_adress"><img src="icon/close.svg" alt="close"></div>';
            $('.fields_adress').append(inputs);        
            console.log('click'); 
            $('#adress').removeClass('red_auto');           
            
        }
        
        for(var elem of $('.cell').children('img')){ }
            elem.addEventListener('click', function(){           
                elem.parentElement.remove();            
            })
       




        
    }
})

$('#adress').change(function(){
    $('#adress').attr('placeholder','');
    $('#adress').removeClass('red_auto');
})

