$(document).ready(function(){

   // Check the inputs with address that they're full
    var summ_address = 0, inputs;
    let change = document.querySelector(".field_address");
    $('#add_address').click(function(){
        if(change.value == ''){ RedAuto(change) }
        else{
            if(summ_address < 3){ addInput(); }
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
        inputs = `<div class="cell"><input type="text" class="text_address add_info" value="${change.value}"><img src="site/includes/dasha/icons/close.svg" alt="close"></div>`;
        document.documentElement.scrollWidth <= 620 ? $('.mobile_fields_address').append(inputs) : $('.fields_address').append(inputs);      
        summ_address++;    

        // remove the cell
        for(var item_new of $('.cell').children('img')){ }
        item_new.addEventListener('click', function(){ item_new.parentElement.remove();  summ_address--});    
    }

    function RedAuto(item){
        if(summ_address > 3){ change.placeholder = "Вы не можете добавить больше 23 адресов"; }
        item.classList.add('red_auto');
        item.setAttribute('placeholder', 'Введите адрес');        
    }


    //*--------- ADD AND EDIT IMGAE ORGANISATION ---------*//  
    // let image = '';  
    // $('.choose_file_organ').on('change',function(){
    //     const file_read = new FileReader();         
    //     file_read.addEventListener('load', ()=>{
    //         image = file_read.result;
    //         console.log(image);
    //         $('.wrap_organ').attr('src', image);
    //     });
    //     file_read.readAsDataURL(this.files[0]);
    // });

    // $('#delete_organ').click(function(){
    //     console.log('delete img');
    //     $('.wrap_organ').attr('src', 'site/includes/dasha/icons/anonym_organization.svg');
    // })  

    // ************** Connect with server ******************
    //! Check how the send on the server the data    
    if($('.second')){ $('.second').addClass('add_organis'); }
    $('.add_organis').on('click', function(){    
        let address = document.querySelectorAll('.text_address'), arr_address = [];
        address.forEach((item) => arr_address.push(item.value));
            
        let formData = new FormData();
        let name = document.querySelector('#name').value;
        let inn = document.querySelector('#inn').value;
        
        let file = document.querySelector('input[type=file]').files[0];
        if (file !== undefined) {
            formData.append('image', file, 'NOT_NULL');
            formData.append('MAX_FILE_SIZE', "6291456");
        }

        formData.append('DBname', getCookie("DBname"));
        formData.append("token", getCookie("token"));
        formData.append("name", name);
        formData.append("inn", inn);
        formData.append("address", JSON.stringify(arr_address));

        let request = new XMLHttpRequest();
        request.open("POST", "https://covidlist.online/api/organisation/add");
        request.send(formData);
        request.onload = function () {
            console.log(request.responseText);
            $('.question').addClass('none');    
            jsonReq = JSON.parse(request.responseText);
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

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

function deleteCookie(name) {
    document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
