$(document).ready(function(){
    //************ VALIDATION FORM FOR FEW INPUTS ************/
    // Validation for inn
    // let inn = document.querySelector('#inn');
    // inn.addEventListener('change',function(){
    //     let pass = /[9-0]{,12}$/;
    //     if(inn.value.match(pass)){ inn.classList.remove('red_auto');  }
    //     else{  inn.classList.add('red_auto'); };
    // })

    // Validation for address
    // var bool;
    // function validationAddress(all){
    //     all.addEventListener('change',function(){
    //         let pass = /[А-Яа-я0-9_,.-]{5,}$/;
    //         if(this.value.match(pass)){ 
    //             this.classList.remove('red_auto'); 
    //             bool = true;
    //         }
    //         else{ 
    //             this.classList.add('red_auto'); 
    //             bool = false;
    //         };
    //     })
    // }

    // Check the inputs with address that they're full
    var summ_address = 0, inputs;
    let change = document.querySelector(".field_address");
    $('#add_address').click(function(){
        if(change.value == ''){ RedAuto(change) }
        else{
            if(summ_address < 3){ addInput(); }
            else { change.placeholder = "Вы не можете добавить больше 23 адресов"; }
            checkAddresses();    
            change.value = '';       
        }
    });

    let address = document.querySelectorAll(".text_address");
    for(let ele of address){
        ele.addEventListener('change', function(){
            if(ele.value == ''){ RedAuto(ele); }
            else{
                ele.classList.remove('red_auto');             
                ele.setAttribute('placeholder',''); 
            }
        })
    }

    function checkAddresses(){
        let adresses = document.querySelectorAll(".text_address");
        for(var elem of adresses){ if(elem.value == ''){RedAuto(elem)} }       
    }

    function addInput(){       
        inputs = `<div class="cell"><input type="text" class="text_address add_info" value="${change.value}"><img src="icon/close.svg" alt="close"></div>`;
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
        else{ change.placeholder = "Вы не можете добавить больше 23 адресов"; }       
    }


    // ************** Connect with server ******************
    //! Check how the send on the server the data
    
    if($('.second')){ $('.second').addClass('add_organis');}
    $('.add_organis').on('click', function(){    
        let address = document.querySelectorAll('.text_address'), arr_address = [];
        address.forEach((item) => arr_address.push(item.value));
            
        let formData = new FormData();
        let name = document.querySelector('#name').value;
        let inn = document.querySelector('#inn').value;
        $('.download_file').on('click', function(){
            let file = document.querySelector('input[type=file]').files[0];
            formData.append('image', file, 'NOT_NULL');
        })
        let anonym = document.querySelector('.download_file').files[0];
        console.log(anonym);

        formData.append('image', anonym, 'NOT_NULL');
        formData.append('MAX_FILE_SIZE', "6291456");
        formData.append('DBname', 'u1184374_hepdesk_2_0');
        formData.append("token", '12345artemy');
        formData.append("name", name);
        formData.append("inn", inn);
        formData.append("address", JSON.stringify(arr_address));

        let request = new XMLHttpRequest();
        request.open("POST", "https://covidlist.online/api/organisation/add");
        request.send(formData);
        request.onload = function () {
            console.log(request.responseText);
        }

    });
})
