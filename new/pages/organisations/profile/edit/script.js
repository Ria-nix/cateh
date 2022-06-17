$(document).ready(function(){
    //************ VALIDATION FORM FOR FEW INPUTS ************/

    // Check the inputs with address that they're full
    var summ_address = 0, inputs;
    let change = document.querySelector(".field_address");
    $('#add_address').click(function(){
        if(change.value === ''){ RedAuto(change) }
        else{
            if(summ_address < 3){ addInput(); }
            else { change.placeholder = "Вы не можете добавить больше 3 адресов"; }
            checkAddresses();    
            change.value = '';       
        }
    });

    let address = document.querySelectorAll(".text_address");
    for(let ele of address){
        ele.addEventListener('change', function(){
            if(ele.value === ''){ RedAuto(ele); }
            else{
                ele.classList.remove('red_auto');             
                ele.setAttribute('placeholder',''); 
            }
        })
    }

    function checkAddresses(){
        let adresses = document.querySelectorAll(".text_address");
        for(var elem of adresses){ if(elem.value === ''){RedAuto(elem)} }
    }

    function addInput(){       
        inputs = `<div class="cell"><input type="text" class="text_address add_info" value="${change.value}"><img src="site/includes/dasha/icons/close.svg" alt="close"></div>`;
        document.documentElement.scrollWidth <= 620 ? $('.mobile_fields_address').append(inputs) : $('.fields_address').append(inputs);      
        summ_address++;    

        // remove the cell
        for(var item_new of $('.cell').children('img')){ }
        item_new.addEventListener('click', function(){ item_new.parentElement.remove();  summ_address--});    
    }

    function RedAuto(item){
        if(summ_address < 3){
            item.classList.add('red_auto');
            item.setAttribute('placeholder', 'Введите адрес');        
        }
        else{ change.placeholder = "Вы не можете добавить больше 3 адресов"; }       
    }


    // ************** Connect with server ******************
    //! Check how the send on the server the data
    
    if($('.second')){ $('.second').addClass('add_organis');}
    $('.add_organis').on('click', function(){    
        let address = document.querySelectorAll('.text_address'), arr_address = [];
        address.forEach((item) => arr_address.push(item.value));
            
        let formData = new FormData();
        let organ_id = $('.font_22').attr('id');
        let name = document.querySelector('#name').value;
        let file = document.querySelector('input[type=file]').files[0];
        if (file !== undefined) {
            formData.append('image', file, 'NOT_NULL');
            formData.append('MAX_FILE_SIZE', "6291456");
        }

        formData.append('MAX_FILE_SIZE', "6291456");
        formData.append('DBname', 'u1184374_hepdesk_2_0');
        formData.append("token", '12345artemy');
        formData.append("name", name);
        formData.append("address", JSON.stringify(arr_address));
        formData.append("organisation_id", organ_id); 

        let request = new XMLHttpRequest();
        request.open("POST", "https://covidlist.online/api/organisation/edit");
        request.send(formData);
        request.onload = function () {
            console.log(request.responseText);
            $('.question').addClass('none');    
            let jsonReq = JSON.parse(request.responseText);
            if(jsonReq["action"] == 'success'){ $('.success').removeClass('none');}
            else if(jsonReq["action"] == 'error-inn-already-exists'){
                $('.error').removeClass('none');
                $('.error_txt').text('Ошибка при отправке: Данный ИНН уже зарегестрирован.');
            }
            else{
                $('.error').removeClass('none');
                $('.error_txt').text('Ошибка при отправке: Неизвестная ошибка при отправке данных.');
            }
        }

    });


})
