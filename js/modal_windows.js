$(document).ready(function(){    
    //Open the modal window and check on all empty inputs
    let bool, summ_check, arr_inputs, obj_keys;
    // $('#check_button').click(function(){         
    //     arr_inputs = document.querySelectorAll(".add_info");
    //     CheckInputs(arr_inputs);
    //     bool ? $('.question').removeClass('none') : bool == false;  
    //     // polygon.style.position = 'none';   
    // });
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
    let input = document.querySelector('#input_file');
    input.addEventListener('change',function(){    
        let file = input.files[0];
        console.log(file.name + '\n' + file.size);
    })

    


    // The output of data on the server to Artemy (ActionPickle.php)

    $('.add_button').click(function(){
        // let inputs = document.querySelectorAll(".json"); 
        // let address = document.querySelectorAll('.address');
        // address.forEach((item) => arr_address.push(item.value));

        let arr = [], json = {}, arr_address = [];
        // obj_keys = ["name_organ", "inn", 'address'];

        // inputs.forEach(function(item){arr.push(item.value)});
        // obj_keys.forEach((key, i) => json[key] = arr[i]);

        // json['address'] = arr_address;
        // json['image'] = $('.logo_second').attr('src');
        // let image = $('.logo_second');
        // console.log(image); 

        // $.ajax({
        //     type: "POST",
        //     data: { 
        //         DBname:"u1184374_hepdesk_2_0",
        //         token: "12345artemy",
        //         name: "55555555",
        //         inn: "555555555",
        //         address: arr_address,
        //         file: image
        //     },
        //     enctype: 'multipart/form-data',
        //     // contentType: 'multipart/form-data',
        //     url: "http://ithelpdeskdemo.xyz/addOrganisation",
        //     success: (msg) => { console.log(msg)   },

        //     //нет ответа от php файла
        //     error: (msg) => {
        //         console.log("error" + "/n"  + msg);
        //     }
        // });
    });

})


