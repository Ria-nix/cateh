let summ = 1, inputs;
let arr = [];
let i = 0;
$('#add_adress').click(function(){
    for(let i = 1; i <= summ; i++){        
        arr.push($('.cell').children('input').val());    
    }

    arr.unshift($('#adress').val()); 

    
    // if($('#adress').val() == ''){ 
    //     $('#adress').addClass('red_auto');
    //     $('#adress').attr('placeholder','Введите адрес ');    
    //     console.log('add adress')          
    // }
    // else 
    if($('.fields_adress').children().last().val() == ''){
        $('#adress').addClass('red_auto');
        $('#adress').attr('placeholder','Введите адрес '); 
        console.log('text')   
        // console.log( element.firstElementChild.value);  
        // summ >= 5 ? inputs = '' : addInput();     
    }
    else{
        // $('#adress').removeClass('red_auto');  
        // $('#adress').attr('placeholder','');   
        $('.text_adress').removeClass('red_auto');             
        $('.text_adress').attr('placeholder',''); 
        summ >= 5 ? inputs = '' : addInput();
        console.log(summ);
        // console.log( $('#adress').val());
        console.log('added')          
        
    }

})


function addInput(){      
    inputs = '<div class="cell"><input type="text" class="text_adress"><img src="icon/close.svg" alt="close"></div>';
    $('.fields_adress').append(inputs); 
    summ++;

    // remove the cell
    for(var elem of $('.cell').children('img')){ }
    elem.addEventListener('click', function(){ elem.parentElement.remove();  summ--});
    

    
    console.log(arr)
    


    // $('.text_adress').focus(function(){
    //     $('.text_adress').removeClass('red_auto');       
    // });
}














// $('#add_adress').click(function(){
//     if($('#adress').val() == ''){ 
//         $('#adress').addClass('red_auto');
//         $('#adress').attr('placeholder','Введите адрес ');    
//         console.log('add adress')          
//     }
//     else if($('.fields_adress').children().last().val() == ''){
//         $('.cell').children('input').change(function() {
//            this.classList.add('red_auto');
//            this.addAtribute('placeholder','Введите адрес');
//            console.log( this.value);
//         })        
//         console.log('text')   
//         console.log( $('.cell').children('input').val());         
//     }
//     else{
//         $('#adress').removeClass('red_auto');  
//         $('#adress').attr('placeholder','');   
//         $('.text_adress').removeClass('red_auto');             
//         $('.text_adress').attr('placeholder',''); 
//         summ >= 5 ? inputs = '' : addInput();
//         console.log(summ);
//         console.log( $('#adress').val());
//         console.log('added')          
        
//     }


//**************************************************************************** */
    // if($('.fields_adress').children().last().val() == ''){
    //     $('.cell').children('input').addClass('red_auto');
    //     $('.cell').children('input').attr('placeholder','Введите адрес');  
    // }
    // else{
    //     $('#adress').removeClass('red_auto');  
    //     $('#adress').attr('placeholder','');   
    //     $('.text_adress').removeClass('red_auto');             
    //     $('.text_adress').attr('placeholder',''); 
    //     summ >= 5 ? inputs = '' : addInput();
    //     console.log(summ);
    // }
///******************************************************************** */
    // $('#adress').focus(function(){
    //     $('#adress').removeClass('red_auto');        
    // });

    // $('.text_adress').focus(function(){      
    //     $('.text_adress').removeClass('red_auto'); 
    // });

//******************************************************************** */

    //*************************************************************** */
// })










// function adressText(){
//     $('.text_adress').blur(function(){
//         if(){
//             $('.text_adress').addClass('red_auto');
//             $('.text_adress').attr('placeholder','Введите адрес');
//         }   
//         else{
//             $('.text_adress').removeClass('red_auto');             
//             $('.text_adress').attr('placeholder','');
//         }
//     });
// }



