$(document).ready(function(){

    //************ VALIDATION FORM FOR FEW INPUTS ************/
    // Validation for password
    $('#password').change(function(){
        if($('#password').value >= 5 && $('#password').value <= 20){
            console.log('right')
        }
        else{ $('#password').add('red_auto')};
    })



     //************ COMPETENTIONS AND FOR ALL ************/
    // SEND ON SERVER INFORMATION ABOUT NEW ORGANIZATION
    let obj = [
        {
            "id": "1",
            "name": "Ведение технической документации"
        },
        {
            "id": "2",
            "name": "Обновление работоспособности компьютерных систем после сбоев"
        },
        {
            "id": "3",
            "name": "Ремонт (несложный) технического оборудования предприятия"
        },
        {
            "id": "4",
            "name": "Модернизация и усовершенствование компьютерных систем предприятия, конфигурация рабочих мест"
        },
        {
            "id": "5",
            "name": "Ведение технической 4654899948 документации"
        },
        {
            "id": "6",
            "name": "Ведение технической 2551 документации"
        },
        {
            "id": "7",
            "name": "Ведение документации"
        },
        {
            "id": "8",
            "name": "Ведение технической 415 документации"
        },   
        {
            "id": "9",
            "name": "delete документации"
        },
        {
            "id": "10",
            "name": "hello friends технической 448884484 документации"
        },  

    ];
     
    // THE LIST OF COMPETENCE FROM DATA BASE
    let list = document.querySelector('ul');    
    var names = [], i = 0;    
    (function isArray(){           
        for(var elem of obj){
            for(var key in elem){};  
            names[i] = elem.name; i++;
            let text_begin = `<li class="competence" id=${elem.id}>${elem.name}</li>`;
            $('#list').append(text_begin);
        }   isChoice();
    }());

    // THE FALL LIST WITH POLYGON ROTATION
    let bool = false, polygon = document.querySelector('#polygon');
    $('#polygon').click(function(){ !bool ? isOpenPolygon() : isClosePolygon() });

    function isClosePolygon(){
        list.classList.add('none');
        bool = false;
        polygon.classList.remove('rotate');
    }
    function isOpenPolygon(){
        list.classList.remove('none');
        bool = true;
        polygon.classList.add('rotate');
    }

    // ************ SEARCH  ************
    var search = document.querySelector('#id_search');
    var text_search, html, text_competence;
    if(search){ 
        var suggestArray = [];
        search.addEventListener('keyup', (e)=>{
                suggestArray = names.filter(item_click => item_click.toLowerCase().includes(e.target.value.toLowerCase()));
                suggestArray = suggestArray.map(item_click => `<li class="competence">${item_click}</li>`);                
            if(!suggestArray.length){
                if(!search.value){ 
                    isClosePolygon();
                    html = suggestArray;
                    isChoice();
                }
                else{                     
                    suggestArray.splice(0, suggestArray.length);
                    text_search = '<li class="add_competence"><span><img src="icon/plus-solid.svg" alt="plus" width="15" height="15"> Добавить</span> </li>';
                    suggestArray.unshift(text_search);                   
                    html = suggestArray.join('');  
                }
            }
            else{ html = suggestArray.join(''); }      
            list.innerHTML = html;       
            isOpenPolygon(); 
            addCompetence();
            isChoice();
        })
    }

    // ************ CHOICE OF THE COMPETENCE  ************
    // CHOICE OF THE COMPETENCE FROM A LIST THAT USER HAS
    var array_test = [], value;
    function isChoice(){       
        let fall_list = document.querySelectorAll('.competence');
        fall_list.forEach(function(item_click){
             item_click.addEventListener('click', function(){ 
                search.value = item_click.innerText;
                text_competence = '<span class="border cell competence_item register">' + search.value + '<img src="icon/close.svg" alt="close"></span>';
                textCompetence(text_competence);
            });
        })           
    }
        

    // THE ADD NEW COMPETENCE
    function addCompetence(){
        $('.add_competence').on('click', function(){
            var show =  search.value.substr(0,1).toUpperCase() + search.value.substr(1).toLowerCase();
            text_competence = '<span class="border cell competence_item unregister">' + show + '<img src="icon/close.svg" alt="close"></span>' ;
            textCompetence(text_competence);
        })
    };

    // THE CONNECT BETWEEN addCompetence() AND isChoice()
    function textCompetence(text_competence){
        if(!array_test.length){ 
            array_test.push(search.value);
            $(".competences").append(text_competence);
        }
        else{  
            for(var mele of array_test){
                if(search.value.split(' ').join('').toLowerCase() != mele.split(' ').join('').toLowerCase()){ value = true; }
                else{ return value = false;}
            }
            if(value){
                var show_second =  search.value.substr(0,1).toUpperCase() + search.value.substr(1).toLowerCase();
                array_test.push(show_second);
                $(".competences").append(text_competence); 
            }
        }
        isRemoveCell();
    }

    // REMOVE THE CELL
    function isRemoveCell(){  
        for(var item of $('.competence_item').children('img')){ };
        item.addEventListener('click', function(){ 
            let index = array_test.indexOf(item.parentElement.innerText);
            if(index !== -1){ array_test.splice(index, 1)}
            item.parentElement.remove();
        });
    };

});

