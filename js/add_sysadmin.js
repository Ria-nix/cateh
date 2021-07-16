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
        }
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

    // ************    ************
    let search = document.querySelector('#id_search');

    // ******************************************************* */
    if(search){ 
        var suggestArray = [], html, text_name;
        search.addEventListener('keyup', (e)=>{
                suggestArray = names.filter(item => item.toLowerCase().includes(e.target.value));
                suggestArray = suggestArray.map(item => `<li class="competence">${item}</li>`);

            if(!suggestArray.length){
                if(!search.value){ 
                    isClosePolygon();
                    html = suggestArray;
                }
                else{ 
                    suggestArray.splice(0, suggestArray.length);
                    text_name = '<li class="addcompetence" ><span><img src="icon/plus-solid.svg" alt="plus" width="15" height="15"> Добавить</span> </li>';
                    suggestArray.unshift(text_name);       
                    html = suggestArray.join(''); 
                }
            }
            else{ html = suggestArray.join(''); } 
            isOpenPolygon();
            list.innerHTML = html;
        })
    }

    (function isChoice(){
        let li_list = document.querySelectorAll('.competence');
        let list_of_li = [];
        for(let li of li_list){ list_of_li.push(li) }
        list_of_li.map(item => item.innerHTML);
        for(var items of list_of_li){ console.log(items)}
        console.log(list_of_li)
        items.addEventListener('click', function(){
        
            for(var li_item of list_of_li){ console.log(li_item)}
            console.log('li up') 
            
            search.value = items.innerHTML;
        })
            
    }());
    


    
    // ************ Output assumptions on the first characters of assumptions *******
    // let search_input = document.querySelector('#list_competence');
    // let suggestionsPanel = document.querySelector('#list');
    // let li_add = document.querySelector('#add_competence');

    // search_input.addEventListener('keyup', function(){
    //     input = search_input.value;
    //     // suggestionsPanel.innerHTML = '';
    //     $('#add_competence').remove('none');
    //     suggestions = obj.filter(function(item_arr){
    //         return item_arr.name.toLowerCase().startsWith(input);
    //     })
    //     isCreateElement(suggestions);
    //     suggestions.forEach(function(item_seg){
    //         text = document.createElement('li');
    //         text.innerHTML = item_seg.name;
    //         text.id = item_seg.id;
    //         suggestionsPanel.append(text);
    //     })
    //     if(input === ''){
    //         suggestionsPanel.innerHTML = ''; 
    //         li_add.classList.remove('none');
    //     }
    // })




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

