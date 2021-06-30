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
            if($('.cell').last('.text_adress').val() == ''){
                $('.text_adress').addClass('red_auto');
                $('.text_adress').attr('placeholder','Введите адрес для добавления еще одного ');
                console.log($('.cell').last('.text_adress').val());
                
            }
            else{
                inputs = '<div class="cell"><input type="text" class="text_adress"><img src="icon/close.svg" alt="close"></div>';
                $('.fields_adress').append(inputs); 
                $('.text_adress').removeClass('red_auto');   
                summ++; 

                for(var elem of $('.cell').children('img')){ }
                elem.addEventListener('click', function(){ elem.parentElement.remove();  summ--});
            }
        }     
        console.log(summ);
        
    }
})

$('#adress').change(function(){
    $('#adress').attr('placeholder','');
    $('#adress').removeClass('red_auto');
});
$('.text_adress').change(function(){
    $('.text_adress').attr('placeholder','');
    $('.text_adress').removeClass('red_auto');
});

