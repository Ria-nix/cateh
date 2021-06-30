let summ = 1, inputs;
let n_adress = document.querySelectorAll('.text_adress');
$('#add_adress').click(function(){
    if($('#adress').val() == ''){ 
        $('#adress').addClass('red_auto');
        $('#adress').attr('placeholder','Введите адрес для добавления еще одного ');         
    }
    else{
        $('#adress').removeClass('red_auto'); 
                    
        if(summ == 23){ inputs = ''; }
        else{
            for(var text of $('.fields_adress').last('cell')){ console.log(text)}
            if($('.cell').last('input').val() != ''){
                inputs = '<div class="cell"><input type="text" class="text_adress"><img src="icon/close.svg" alt="close"></div>';
                $('.fields_adress').append(inputs); 
                $('.text_adress').removeClass('red_auto');   
                summ++; 

                for(var elem of $('.cell').children('img')){ }
                elem.addEventListener('click', function(){ elem.parentElement.remove();  summ--});
            }
            else{
                $('.text_adress').addClass('red_auto');
                $('.text_adress').attr('placeholder','Введите адрес для добавления еще одного '); 
            }
        }     
        console.log(summ);
        
    }
})
for(let adress of n_adress){
    adress.addEventListener('change', function(){
        adress.removeAttribute('placeholder');
        adress.classList.remove('red_auto');
    });
    console.log(adress)
}


// $('input').change(function(){
//     $('.text_adress').attr('placeholder','');
//     $('.text_adress').removeClass('red_auto');
// });

