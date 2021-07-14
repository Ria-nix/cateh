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
    $('#polygon').click(function(){  
        if(!bool){ 
            list.classList.remove('none');
            bool = true;
            polygon.classList.add('rotate');
        }
        else{ 
            list.classList.add('none');
            bool = false;
            polygon.classList.remove('rotate');
        }
    })

    let search = document.querySelector('#id_search');
    // ************    ************
    search.addEventListener('input', (e)=>{
        let html;   
        let suggestArray = [];
        $('#add_competence').remove('none');
        if(e.target.value.toLowerCase()){
            suggestArray = names.filter(item => item.toLowerCase().includes(e.target.value));
            suggestArray = suggestArray.map(item => `<li class="competence">${item}</li>`);
        }
        if(!suggestArray.length){
            $('#add_competence').remove('none');
            console.log(suggestArray + "2")
        }
        else{
            $('#add_competence').add('none');
            html = suggestArray.join('');
            console.log(suggestArray + "4")
        }
        list.classList.remove('none');
        bool = true;
        polygon.classList.add('rotate');
        // let html = !suggestArray.length ? $('#add_competence').remove('none') : suggestArray.join('');

        document.querySelector('ul').innerHTML = html;
    })

    (function isChoice(){
        let li_list = document.querySelectorAll('.competence');
        consoke,k
        for(let list of li_list){ 
            console.log(list.innerHTML); 
        }
        list.addEventListener('click', function(){
            $('#id_search').val(list.innerHTML);
            console.log('li up') 

        })
    }());
    
        
       


    // function ShowElements(suggestArray){

       
        // for(var elem in suggestArray){ }
        // console.log(elem.length)
      
        // suggestArray.forEach(function(item_seg){
            // text = document.createElement('li');
            // text.innerHTML = suggestArray.elem;
            // text.id = suggestArray.id;
            // suggestionsPanel.append(text);
        // })
    // }



    
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

