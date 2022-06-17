$(document).ready(function () {

    //************ VALIDATION FORM FOR FEW INPUTS ************/
    // Validation for 
    // let password = document.querySelector('#password');
    // password.addEventListener('change', function () {
    //     let pass = /[A-Za-z_,.]\w{5,20}$/;
    //     if (password.value.match(pass)) {
    //         console.log('right')
    //         password.classList.remove('red_auto');
    //     }
    //     else {
    //         password.classList.add('red_auto');
    
    ////password.hasAttributes('Пароль может иметь содержать латинские буквы, цифры и символы: "_" "," "."');
    //         console.log('no')
    //     };
    // })

let number = document.querySelector('#tel_number');
    $('#tel_number').focus(function(){ number.value = '+7 ';})

    $('#tel_number').change(function(){
        let pass = /^[-+]?[0-9 ]{0,15}$/;
        if (number.value.match(pass)) {
            number.classList.remove('red_auto');
        }
        else{ 
            number.value = '';
            number.classList.add('red_auto');
        }
    })

    //************ COMPETENTIONS AND FOR ALL ************/
    // SEND ON SERVER INFORMATION ABOUT NEW ORGANIZATION

    let list = document.querySelector('#list');
    let list_state = document.querySelector('#list_state');

    // ********** THE FALL LIST WITH POLYGON FOR STATE ****************
    let state = false, state_polygon = document.querySelector('#polygon_state');
    $('#polygon_state').click(function () { !state ? isOpenState() : isCloseState() });
    function isCloseState() {
        list_state.classList.add('none');
        state = false;
        state_polygon.classList.remove('rotate');
    }
    function isOpenState() {
        list_state.classList.remove('none');
        state = true;
        state_polygon.classList.add('rotate');
    }

    let state_input = document.querySelector('.state_value');
    for(let item_state of $('.states')){
        item_state.addEventListener('click', function(){ 
            state_input.value = item_state.innerText;            
        })
    }
    
    // ********** THE FALL LIST WITH POLYGON FOR COMPETENSES ****************
    let bool = false, polygon = document.querySelector('#polygon');
    $('#polygon').click(function () { !bool ? isOpenPolygon() : isClosePolygon() });
    function isClosePolygon() {
        list.classList.add('none');
        bool = false;
        polygon.classList.remove('rotate');
    }
    function isOpenPolygon() {
        list.classList.remove('none');
        bool = true;
        polygon.classList.add('rotate');
    }

    // ************ SEARCH  ************
    var search = document.querySelector('#id_search');
    let names = [],fall_list = document.querySelectorAll('.competence');
    for(let elem of fall_list){names.push(elem.innerText)};
    isChoice();
    var text_search, html, text_competence;
    if (search) {
        var suggestArray = [];
        search.addEventListener('keyup', (e) => {
            suggestArray = names.filter(item => item.toLowerCase().includes(e.target.value.toLowerCase()));
            suggestArray = suggestArray.map(item => `<li class="competence">${item}</li>`);
            if (!suggestArray.length) {
                if (!search.value) {
                    isClosePolygon();
                    html = suggestArray;
                    isChoice();
                }
                else {
                    suggestArray.splice(0, suggestArray.length);
                    text_search = '<li class="add_competence"><span><img src="icon/plus-solid.svg" alt="plus" width="15" height="15"> Добавить</span> </li>';
                    suggestArray.unshift(text_search);
                    html = suggestArray.join('');
                }
            }
            else { html = suggestArray.join(''); }
            list.innerHTML = html;
            isOpenPolygon();
            addCompetence();
            isChoice();
        })
    }

    // ************ CHOICE OF THE COMPETENCE  ************
    // CHOICE OF THE COMPETENCE FROM A LIST THAT USER HAS
    var array_test = [], value;
    function isChoice() {
        let fall_list = document.querySelectorAll('.competence');
        fall_list.forEach(function (item_click) {
            item_click.addEventListener('click', function () {
                search.value = item_click.innerText;
                let uppercase = search.value.substr(0, 1).toUpperCase() + search.value.substr(1).toLowerCase();
                text_competence = '<span class="border cell competence_item register">' + uppercase + '<img src="icon/close.svg" alt="close"></span>';
                textCompetence(text_competence);
            });
        })
    }
    // THE ADD NEW COMPETENCE
    function addCompetence() {
        $('.add_competence').on('click', function () {
            let uppercase = search.value.substr(0, 1).toUpperCase() + search.value.substr(1).toLowerCase();
            text_competence = '<span class="border cell competence_item unregister">' + uppercase + '<img src="icon/close.svg" alt="close"></span>';
            textCompetence(text_competence);
        })
    };

    // THE CONNECT BETWEEN addCompetence() AND isChoice()
    function textCompetence(text_competence) {
        if (!array_test.length) {
            array_test.push(search.value)
            $(".competences").append(text_competence);
        }
        else {
            for (var mele of array_test) {
                if (search.value.split(' ').join('').toLowerCase() != mele.split(' ').join('').toLowerCase()) { value = true; }
                else { return value = false; }
            }
            if (value) {
                array_test.push(search.value);
                $(".competences").append(text_competence);
            }
        }   isRemoveCell();
    }

    // REMOVE THE CELL
    function isRemoveCell() {
        for (var item of $('.competence_item').children('img')) { };
        item.addEventListener('click', function () {
            let index = array_test.indexOf(item.parentElement.innerText.toLowerCase());
            if (index !== -1) { array_test.splice(index, 1) }
            item.parentElement.remove();
        });
    };

    // ************** Connect with server ******************
    //! Check how the send on the server the data
    if($('.second')){ $('.second').addClass('add_sysadmin');}
    $('.add_sysadmin').on('click', function(){     
        let formData = new FormData();
        let email = document.querySelector('#email').value;
        let password = document.querySelector('#password').value;
        let name = document.querySelector('#name').value;
        let surname = document.querySelector('#surname').value;
        let tel_number = document.querySelector('#tel_number').value;
        let unregister_arr = [], register_arr = [];
        for(let item_unregister of $('.unregister')){ unregister_arr.push(item_unregister)}
        for(let item_register of $('.register')){ register_arr.push(item_register)}

        let file = document.querySelector('input[type=file]').files[0];
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
        formData.append("set_categories_list", JSON.stringify(register_arr));
        formData.append("add_new_categories_list", JSON.stringify(unregister_arr));
    
        let request = new XMLHttpRequest();
        request.open("POST", "https://covidlist.online/addSysadmin");
        request.send(formData);
        request.onload = function () { console.log(request.responseText); }
    });


    const ACCESS_LEVEL_SYS_ADMIN = 3;
    const ACCESS_LEVEL_ADMIN = 4;


});

