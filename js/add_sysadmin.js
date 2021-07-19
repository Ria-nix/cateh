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
            let text = `<li class="competence" id="${elem.id}">${elem.name}</li>`;
            $('#list').append(text);
    }}());

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

    // ************    ************
    let search = document.querySelector('#id_search');
    if(search){ 
        var suggestArray = [], html, text, full_list;
        search.addEventListener('keyup', (e)=>{
                console.log(e.target.value)
                suggestArray = names.filter(item => item.toLowerCase().includes(e.target.value.toLowerCase()));
                suggestArray = suggestArray.map(item => `<li class="competence">${item}</li>`);

            if(!suggestArray.length){
                if(!search.value){ isClosePolygon();
                    html = suggestArray;
                }
                else{ 
                    suggestArray.splice(0, suggestArray.length);
                    text = '<li class="addcompetence"><span><img src="icon/plus-solid.svg" alt="plus" width="15" height="15"> Добавить</span> </li>';
                    suggestArray.unshift(text);       
                    html = suggestArray.join(''); 
                }
            }
            else{ html = suggestArray.join(''); } 
            full_list = document.querySelectorAll('.competence');
            isOpenPolygon(); 
            list.innerHTML = html;
            isChoice(full_list);
        })
    }

    function isChoice(full_list){
        // console.log(full_list)
        for(var item_click of full_list){ 
            //  item_click.addEventListener('click', function(){
        
                // console.log(full_list, item_click) 
                
            // })
        }
       
            
    };
    



       // remove the cell
    // (function isRemoveCell(){        
    //     console.log('work')
    //     for(var elem of $('.cell').children('img')){console.log(elem) }
    //     elem.addEventListener('click', function(){ 
    //         console.log('yup')
    //         elem.parentElement.remove();
    //     })
    // }());
   



});

