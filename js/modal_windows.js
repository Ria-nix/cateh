$(document).ready(function(){
    let polygon = document.querySelector('.searchable')
    
    //Open the modal window and check on all empty inputs
    let bool, summ_check, obj, json, arr_inputs, obj_keys;
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

    // Modal Windows PHP files

    // Close the modal window
    $('.close_button').click(function(){ 
        $('.modal_window').addClass('none');
        // polygon.style.position = 'relative';
    });

    // The output of data on the server to Artemy (ActionPickle.php)
    // $('.add_button').click(function(){
        json = document.querySelectorAll(".add_info"); 
        console.log(json)
        obj = {};
        obj_keys = ["name_organ", "inn", "addresses", "img"];
        
        json.forEach(function(item){  
            for(var elem of obj_keys){
               
                console.log(obj)
            }        
            obj[elem] = item;    
        })
        console.log(obj); 

        // $.ajax({
        //     type: "POST",
        //     data: { },
        //     url: "http://ithelpdeskdemo.xyz/login",
        //     success: (msg) => { console.log(msg)   },

        //     //нет ответа от php файла
        //     error: (msg) => {
        //         console.log("error" + "/n"  + msg);
        //     }
        // });
    // });

})


