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

    let list = document.querySelector('ul');

    // THE FALL LIST WITH POLYGON ROTATION
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
                console.log(mele)
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
            let index = array_test.indexOf(item.parentElement.innerText);
            if (index !== -1) { array_test.splice(index, 1) }
            item.parentElement.remove();
        });
    };
});

