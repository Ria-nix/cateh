$(document).ready(function(){

    //************ VALIDATION FORM FOR FEW INPUTS ************/
    // Validation for password
    // $('#password').change(function(){
        // if($('#password'))
    // })



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
     
    // THE LIST OF COMPETENCE FROM DATA BASE
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
    function isChoice(){       
        let fall_list = document.querySelectorAll('.competence'), item_list, arr;
        arr = [];
        // for(var lot of names){ arr.push(lot) }
        // console.log(arr)
        for(var item_click of fall_list){            
            item_click.addEventListener('click', function(){
                item_list = document.querySelectorAll('.competence_item');
                for(var lot of arr){ arr.push(lot.innerText) }
                console.log(arr)
                if($('.competences').is(":empty")){ isCreate(this)  }
                else{
                    // for(let i = 0; i < arr.length; i++){ 
                    //     console.log(arr[i]);
                        if(search.value == arr[i]){  
                            console.log('equal'); 
                        } 
                        else{ 
                            arr.push(lot.innerText);
                            isCreate(this) 
                        // }  
                    }
                   
                }
                  
            })              
        }
       
    }

    function isCreate(item_click){
        search.value = item_click.innerHTML;         
        text_competence = '<span class="border cell competence_item register">' + search.value + '<img src="icon/close.svg" alt="close"></span>' ;
        $(".competences").append(text_competence);
    }

     // search.value = item_click.innerHTML;         
                // text_competence = '<span class="border cell competence_item register">' + search.value + '<img src="icon/close.svg" alt="close"></span>' ;
                // $(".competences").append(text_competence);
                // console.log('item_click');
                // isAddCompetence();
                // isRemoveCell();



    // THE ADD NEW COMPETENCE
    function addCompetence(){
        $('.add_competence').on('click', function(){
            text_competence = '<span class="border cell competence_item unregister">' + search.value + '<img src="icon/close.svg" alt="close"></span>' ;
            $(".competences").append(text_competence);
            isRemoveCell();
            // isAddCompetence();
        })
    };

    // REMOVE THE CELL
    function isRemoveCell(){      
        for(var item of $('.competence_item').children('img')){ };
        item.addEventListener('click', function(){ item.parentElement.remove();});
    };

     // ************ CHECK OF THE COMPETENCE  ************
    function isAddCompetence(){
        if($('.competences').empty()){
            console.log('empty');
            // search.value = item_click.innerHTML;         
            // text_competence = '<span class="border cell competence_item register">' + search.value + '<img src="icon/close.svg" alt="close"></span>' ;
            // $(".competences").append(text_competence);
            // console.log('item_click');
            
            // text_competence = '<span class="border cell competence_item unregister">' + search.value + '<img src="icon/close.svg" alt="close"></span>' ;
            // $(".competences").append(text_competence);
            // console.log('add');
            
        }
        else{
            console.log('none empty');
        }
       
    }

    // for(var item_list of $('.competences').children('.competence_item')){ console.log(item_list) }
    //         if(search.value == item_list.value){
    //            console.log('no')
    //         } 
    //         else{
    //             search.value = item_click.innerHTML;         
    //             text_competence = '<span class="border cell competence_item register">' + search.value + '<img src="icon/close.svg" alt="close"></span>' ;
    //             $(".competences").append(text_competence);
    //         }
   
});

