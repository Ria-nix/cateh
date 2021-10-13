$(document).ready(function(){

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
            console.log(array_test)
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
            let index = array_test.indexOf(item.parentElement.innerText.toLowerCase());
            if (index !== -1) { array_test.splice(index, 1) }
            item.parentElement.remove();
        });
    };


    $("#delete_img").click(function(){
        $('.logo_second').attr('src', 'icon/michael.jpg');
    })
})