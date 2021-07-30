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
    let input = document.querySelector('#input_file');
    // input.addEventListener('change',function(){    
    //     let file = input.files[0];
    //     let reader = new FileReader();
    //     reader.readAsText(file);
    // })


    // The output of data on the server to Artemy (ActionPickle.php)
    $('.add_button').on('click', function(){       
        
        //*********** Add organisation  ***************
        // let address = document.querySelectorAll('.text_address'), arr_address = [];
        // address.forEach((item) => arr_address.push(item.value));
            
        // let formData = new FormData();
        // let name = document.querySelector('#name').value;
        // let inn = document.querySelector('#inn').value;
        // let file = document.querySelector('input[type=file]').files[0];
        // formData.append('file', file, 'NOT_NULL');
        // formData.append('MAX_FILE_SIZE', "6291456");
        // formData.append('DBname', 'u1184374_hepdesk_2_0');
        // formData.append("token", '12345artemy');
        // formData.append("name", name);
        // formData.append("inn", inn);
        // formData.append("address", JSON.stringify(arr_address));

        // let request = new XMLHttpRequest();
        // request.open("POST", "https://ithelpdeskdemo.xyz/addOrganisation");
        // request.send(formData);
        // request.onload = function () {
        //     console.log(request.responseText);
        // }

        // ******* Add sysadmin ********
        let formData = new FormData();
        let email = document.querySelector('#email').value;
        let password = document.querySelector('#password').value;
        let name = document.querySelector('#name').value;
        let surname = document.querySelector('#surname').value;
        let tel_number = document.querySelector('#tel_number').value;

        let file = document.querySelector('input[type=file]').files[0];
        // console.log(file)
        if(file !== undefined){
            formData.append('image', file, 'NOT_NULL');
            formData.append('MAX_FILE_SIZE', "6291456");
        }
        
        formData.append('DBname', 'u1184374_second_company_bd');
        formData.append("token", 'lera_token');
        formData.append("password", password);
        formData.append("role", 3);
        formData.append("name", name);
        formData.append("surname", surname);
        formData.append("email", email);
        formData.append("phone_number", tel_number);
        formData.append("set_categories_list", JSON.stringify([1]));
        formData.append("add_new_categories_list", JSON.stringify(["test"]));

        let request = new XMLHttpRequest();
        request.open("POST", "https://ithelpdeskdemo.xyz/addSysadmin");
        request.send(formData);
        request.onload = function () {
            console.log(request.responseText);
        }

    });
    
})

const ACCESS_LEVEL_SYS_ADMIN = 3;
const ACCESS_LEVEL_ADMIN = 4;
