$(document).ready(function(){    

    //Open the modal window and check on all empty inputs
    let bool, summ_check, arr_inputs, obj_keys;
    $('#check_button').click(function(){         
        arr_inputs = document.querySelectorAll(".add_info");
        CheckInputs(arr_inputs);
        bool ? $('.question').removeClass('none') : bool == false;  
        // polygon.style.position = 'none';   
    });

    function CheckInputs(arr_inputs){   
        summ_check = 0; 
        arr_inputs.forEach(function(item){
            item.value == '' ? isRedAuto(item) : summ_check++;
            item.addEventListener('change', function(){
                item.value == '' ? isRedAuto(item) : isNoneRedAuto(item);
            });
        });  summ_check == arr_inputs.length ? bool = true : bool = false;
    }
    function isRedAuto(item_info){
        item_info.classList.add('red_auto');
        item_info.setAttribute('placeholder','Заполните поле'); 
        
    }
    
    function isNoneRedAuto(item_info){
        item_info.classList.remove('red_auto');
        item_info.setAttribute('placeholder','');  
    }
    // Close the modal window
    $('.close_button').click(function(){ 
        $('.modal_window').addClass('none');
    });

    // Edit images on all pages
    // let input = document.querySelector('#input_file');
    // input.addEventListener('change',function(){    
    //     let file = input.files[0];
    //     let reader = new FileReader();
    //     reader.readAsText(file);
    // })
    
})
