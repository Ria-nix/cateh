//Open the modal window
$('#add_button').click(function(){ 
    let info = document.querySelectorAll(".add_info");
// $('.add_info').change(function(){
            $('.add_info').filter(function(){
                
                if($(this).val() == ''){
                    $(this).addClass('red_auto') + "" 
                    $(this).attr('placeholder','Заполните поле');
                }
                else{
                    $(this).removeClass('red_auto') + $(this).attr('placeholder','Заполните поле');
                    console.log ('cool');
                }
            // })

        })
       

        // isRedAuto($('.add_info'));
        // $('.add_info').on('change', function(){
        //     if($('.add_info').val() == ''){
        //         isRedAuto($('.add_info'));
        //     }
        //     else{
        //         $('.add_info').removeClass('red_auto');
        //         $('.add_info').setAttribute('placeholder','');
        //         // $('.modal_window').removeClass('none');
        //     }
        // });
    // })
    // Verification for the last element of the "array"
    // if(item_info.value == ''){ 
    //     isChange(item_info);
    //     console.log('change false second')
    // } 
    // else{ console.log('change true second');  $('.modal_window').removeClass('none');}
    // окончание проверки
        

});

// function isChange(item_info){
//     isRedAuto(item_info);
//     item_info.addEventListener('change', function(){
//         if(item_info.value == ''){
//             isRedAuto(item_info);
//         }
//         else{
//             item_info.classList.remove('red_auto');
//             item_info.setAttribute('placeholder','');
//             // $('.modal_window').removeClass('none');
//         }
//     });
// }

function isRedAuto(item_info){
    item_info.addClass('red_auto');
    item_info.attr('placeholder','Заполните поле'); 
}

// function isRedAuto(item_info){
//     item_info.classList.add('red_auto');
//     item_info.setAttribute('placeholder','Заполните поле'); 
// }

// Close the modal window
$('.close_button').click(function(){ 
    $('.modal_window').addClass('none');
});

// The output of data on the server to Lera or Artemy (ActionPickle.php)
$('.add_button').click(function(){
    // let adress_all = document.querySelectorAll(".text_adress"); 
    // for(let none of adress_all){  
    //     console.log(none.value);  
    // }
    // if(address_all.value != ''){  }
    // else{  }
               
});






// $('#add_button').click(function(){ 
//     let info = document.querySelectorAll(".add_info");
    
//     for(var item_info of info){  
//         console.log(item_info.value);
//         if(item_info.value == ''){ 
//             RedAuto(item_info); 
//             console.log('for cicle and value == "0"');
//         } 
//     }

//     item_info.addEventListener('change', function(){
//         if(item_info.value == ''){ 
//             RedAuto(item_info);
//             console.log('change false')
//          } 
//         else{
//             console.log('change true')
//             item_info.classList.remove('red_auto');
//             item_info.setAttribute('placeholder','');
//         }
//     });
//     if(item_info.value == ''){ 
//         console.log('none')
//      }
//     else{
//         item_info.classList.remove('red_auto');
//         item_info.setAttribute('placeholder','');
//         $('.modal_window').removeClass('none');
//         console.log('open window')
//     } 
// });