$(document).ready(function(){
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
            "name": "Ведение технической  4654899948 документации"
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
            "name": "Ведение технической  448884484 документации"
        },   
        {
            "id": "9",
            "name": "delete документации"
        },
        {
            "id": "10",
            "name": "hellow friends технической  448884484 документации"
        },  

    ];

    let list = document.querySelector('ul');    
    var names = [], i = 0;    
    (function isArray(){           
        for(var elem of obj){
            for(var key in elem){};  
            names[i] = elem.name; i++;
            let text_begin = `<li class="competence" id=${elem.id}>${elem.name}</li>`;
            $('#list').append(text_begin);
        }   isChoice()
    }());
    
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
    let search = document.querySelector('#id_search');
    if(search){ 
        var suggestArray = [], html, text_search;
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
                    text_search = '<li class="add_competence"><span class="add_competence"><img src="icon/plus-solid.svg" alt="plus" width="15" height="15"> Добавить</span> </li>';
                    suggestArray.unshift(text_search);    
                    addCompetence();   
                    html = suggestArray.join('');                    
                }
            }
            else{ html = suggestArray.join(''); }             
            isOpenPolygon(); 
            list.innerHTML = html;
            isChoice()
        })
    }

    // ************ CHOICE OF COMPETENCE  ************
    let container = document.querySelector('.competences');
    

    function isChoice(){
        let text_competence, sum = 0, j = 0, id = [];
        let fall_list = document.querySelectorAll('.competence');

        // for(var rem of obj){
        //     for(let key in rem){};  
        //     id[i] = rem.id; j++;
        // } 

        for(let item_click of fall_list){ 
            item_click.addEventListener('click', function(){
                if(item_click){
                    search.value = item_click.innerHTML;         
                    text_competence = '<span class="border cell register" id="">' + search.value + '<img src="icon/close.svg" alt="close"></span>' ;
                    $(".competences").append(text_competence);
                    console.log(container)
                }               
            })
        }
    }

    let add_but = document.querySelectorAll('.add_competence');
    function addCompetence(){
        for(var item_add of add_but){ console.log(item_add)}
        // item_add.addEventListener('click', function(){
            console.log('click')
            // if(item_click){
            //     search.value = item_click.innerHTML;         
            //     text_competence = '<span class="border cell unregister">' + search.value + '<img src="icon/close.svg" alt="close"></span>' ;
            //     $(".competences").append(text_competence);
            //     console.log(container)
            // }               
        // })
    };
    // addCompetence();
       // remove the cell
    // (function isRemoveCell(){        
    //     console.log('work')
    //     for(var elem of $('.cell').children('img')){console.log(elem) }
    //     elem.addEventListener('click', function(){ 
    //         console.log('yup')
    //         elem.parentElement.remove();
    //     })
    //     for(let item_click of fall_list){ 
    //         item_click.addEventListener('click', function(){
    //             if(item_click){
    //                 search.value = item_click.innerHTML;         
    //                 text_competence = '<span class="border cell">' + search.value + '<img src="icon/close.svg" alt="close"></span>' ;
    //                 $(".competences").append(text_competence);
    //                 console.log(container)
    //             }
               
    //         })
    //     }
    // }());
   



});

